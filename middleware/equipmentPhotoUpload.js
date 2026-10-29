import multer from "multer";

const MAX_PHOTO_SIZE = 20 * 1024 * 1024;

const upload = multer({
  storage: multer.memoryStorage(),
  limits: {
    fileSize: MAX_PHOTO_SIZE,
    files: 1
  },
  fileFilter: (req, file, callback) => {
    const supportedTypes = new Set(["image/jpeg", "image/png", "image/webp"]);
    if (!supportedTypes.has(file.mimetype)) {
      return callback(new Error("Choose a JPEG, PNG, or WebP equipment photo."));
    }
    callback(null, true);
  }
});

export const uploadEquipmentPhoto = (req, res, next) => {
  upload.single("photo")(req, res, (error) => {
    if (!error) return next();

    const message = error instanceof multer.MulterError && error.code === "LIMIT_FILE_SIZE"
      ? "Equipment photos must be 20 MB or smaller."
      : error.message;
    req.flash("error_msg", message);
    res.redirect(req.params.id ? `/equipment/${req.params.id}/edit` : "/equipment/new");
  });
};
