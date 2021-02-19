import Route from '@ember/routing/route';

export default Route.extend({
  model() {
    return [{
      id: 1,
      title: 'pragathish',
      firstname: 'pragathish',
      lastname: 'sathish',
      city: 'chennai',
      role: 'Developer',
      distance: 15,
      email: 'pragathish@gmail.com',
      mobile: '9080187177',
      password: 'ABcd123@'
    }];
      //return this.store.findRecord('profile');
  }
});