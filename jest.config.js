const path = require("path");

const rootDir = process.cwd();
module.exports = {
  verbose: true,
  rootDir,
  coverageDirectory: "coverage",
  collectCoverageFrom: ["lib/**/*.{js,jsx}"]
};
