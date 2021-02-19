import EmberRouter from '@ember/routing/router';
import config from 'runner/config/environment';

export default class Router extends EmberRouter {
  location = config.locationType;
  rootURL = config.rootURL;
}

Router.map(function () {
  this.route('about');
  this.route('login');
  this.route('register');
  this.route('home');
  this.route('logout');
  this.route('profile');
  this.route('distance');

});
