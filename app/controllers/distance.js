import Controller from 'ember';

export default Ember.Controller.extend({

  actions: {
    showpopup(id) {
      alert(id);
      //this.set('counter',this.get('counter')+val);
    }
}
});
