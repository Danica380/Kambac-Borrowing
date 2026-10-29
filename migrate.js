import { sequelize } from "./models/db.js";
import { User } from "./models/userModel.js";
import { Borrowing } from "./models/borrowingModel.js";
import { ensureEquipmentSchema } from "./models/equipmentModel.js";

try {
  await sequelize.authenticate();
  console.log("Connected to MySQL database!");

  await sequelize.sync();
  await ensureEquipmentSchema();
  await Borrowing.sync();

  console.log(
    `Tables created or verified for ${User.name}, equipment, and ${Borrowing.name}!`
  );
} catch (err) {
  console.error("Database migration failed:", err.message);
  process.exitCode = 1;
} finally {
  await sequelize.close();
}