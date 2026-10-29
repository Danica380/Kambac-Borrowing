import { DataTypes } from "sequelize";
import { sequelize } from "./db.js";

export const EQUIPMENT_CONDITIONS = ["good", "fair", "poor", "damaged", "under_repair"];
export const BORROWABLE_CONDITIONS = ["good", "fair"];

export const Equipment = sequelize.define("EquipmentItem", {
  itemCode: {
    type: DataTypes.STRING(40),
    allowNull: false,
    unique: true,
    validate: { notEmpty: true, len: [2, 40] }
  },
  name: {
    type: DataTypes.STRING(120),
    allowNull: false,
    validate: { notEmpty: true, len: [1, 120] }
  },
  category: {
    type: DataTypes.STRING(80),
    allowNull: false,
    validate: { notEmpty: true, len: [1, 80] }
  },
  photoPath: { type: DataTypes.STRING(255), allowNull: true },
  description: { type: DataTypes.TEXT, allowNull: true },
  unit: {
    type: DataTypes.STRING(40),
    allowNull: false,
    defaultValue: "pieces",
    validate: { notEmpty: true, len: [1, 40] }
  },
  totalQuantity: {
    type: DataTypes.INTEGER,
    allowNull: false,
    defaultValue: 0,
    validate: { min: 0, isInt: true }
  },
  availableQuantity: {
    type: DataTypes.INTEGER,
    allowNull: false,
    defaultValue: 0,
    validate: { min: 0, isInt: true }
  },
  borrowedQuantity: {
    type: DataTypes.INTEGER,
    allowNull: false,
    defaultValue: 0,
    validate: { min: 0, isInt: true }
  },
  condition: {
    type: DataTypes.ENUM(...EQUIPMENT_CONDITIONS),
    allowNull: false,
    defaultValue: "good"
  },
  isActive: { type: DataTypes.BOOLEAN, allowNull: false, defaultValue: true }
}, {
  tableName: "equipment_items",
  validate: {
    quantitiesAreConsistent() {
      if (this.availableQuantity + this.borrowedQuantity !== this.totalQuantity) {
        throw new Error("Available and borrowed quantities must add up to total quantity.");
      }
    }
  }
});

export const ensureEquipmentSchema = async () => {
  await Equipment.sync();
  const queryInterface = sequelize.getQueryInterface();
  const columns = await queryInterface.describeTable(Equipment.getTableName());
  if (!columns.photoPath) {
    await queryInterface.addColumn(Equipment.getTableName(), "photoPath", {
      type: DataTypes.STRING(255),
      allowNull: true
    });
  }
};

export { sequelize };
