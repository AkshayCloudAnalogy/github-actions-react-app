const core = require("@actions/core");
const github = require("@actions/github");

const run = async () => {
  try {
    core.debug("Debug Message");
    core.warning("Warning Message");
    core.error("Error Message");

    const name = core.getInput("who-to-greet");
    core.setSecret(name);
    console.log(`Hello ${name}`);

    const time = new Date();
    core.setOutput("time", time.toTimeString());

    core.startGroup("Logging github object");
    console.log(JSON.stringify(github, null, "\t"));
    core.endGroup();

    // const result = await core.group("Do something async", async () => {
    //   const response = await doSomeHTTPRequest();
    //   return response;
    // });
    core.exportVariable("HELLO", "hello");
  } catch (error) {
    core.setFailed(error.message);
  }
};

run();
