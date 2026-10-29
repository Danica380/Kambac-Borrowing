import express from "express";
import os from "node:os";

const app = express();
const port = Number(process.env.PORT || 5000);
const startedAt = Date.now();

app.get("/", (req, res) => {
  res.json({
    api: "Docker Containerized Node.js REST Service",
    status: "healthy",
    node_version: process.version,
    container_id: os.hostname(),
    uptime_seconds: Math.floor((Date.now() - startedAt) / 1000),
  });
});

app.listen(port, "0.0.0.0", () => {
  console.log(`Node.js API listening on port ${port}`);
});
