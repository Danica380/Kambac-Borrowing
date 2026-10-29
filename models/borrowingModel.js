import { DataTypes } from "sequelize";
import { sequelize } from "./db.js";

export const Borrowing = sequelize.define("BorrowingRecord", {
  equipmentId: {
    type: DataTypes.INTEGER,
    allowNull: false,
    references: { model: "equipment_items", key: "id" }
  },
  borrowerName: {
    type: DataTypes.STRING(120),
    allowNull: false,
    validate: { notEmpty: true, len: [1, 120] }
  },
  quantity: {
    type: DataTypes.INTEGER,
    allowNull: false,
    validate: { min: 1, max: 2147483647, isInt: true }
  },
  borrowedAt: {
    type: DataTypes.DATEONLY,
    allowNull: false
  },
  dueDate: {
    type: DataTypes.DATEONLY,
    allowNull: false
  },
  purpose: {
    type: DataTypes.TEXT,
    allowNull: true
  },
  returnedAt: {
    type: DataTypes.DATEONLY,
    allowNull: true
  }
}, {
  tableName: "borrowing_records",
  indexes: [{ fields: ["equipmentId", "borrowedAt"] }]
});
