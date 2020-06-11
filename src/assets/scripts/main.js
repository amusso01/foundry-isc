/************** JS HERE ***************
 *********************************************/

// import local dependencies
import Router from "./util/Router";
import common from "./routes/common";
import home from "./routes/home";
import about from "./routes/about";
import leadershipTeamTemplate from "./routes/leadershipTeamTemplate";

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About page
  about,
  // leadership_team page
  leadershipTeamTemplate
});

document.addEventListener("DOMContentLoaded", function(event) {
  routes.loadEvents();
});
