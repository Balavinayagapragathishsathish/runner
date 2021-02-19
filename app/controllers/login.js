import Controller from 'ember';

export default Ember.Controller.extend({
  init() {
    this._super(...arguments);
    
  },
  actions: {
    checkuser(uname,pass) {
        var url="http://localhost/runner/connect.php";
        localStorage.setItem("uname", uname);
        url = `${url}${"?uname="}${uname}${"&pass="}${pass}`;
        location.replace(url);
    }
}
});
