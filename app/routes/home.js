import Route from '@ember/routing/route';

export default Route.extend({
  model() {
    return [{
            type: 'normaluser',
            name: 'pragathish',
              title: 'pragathish',
              distance: 10,
              city: 'Coimbatore',
              Team: 'Developer',
              email: 'pragathish@gmail.com',
        
          }, {
            type: 'normaluser',
            name: 'Deepak',
              title: 'Deepak',
              distance: 8,
              city: 'Chennai',
              Team: 'BA memeber',
              email: 'deepak@gmail.com',
            
          }, {
            type: 'normaluser',
            name: 'rahul',
              title: 'rahul',
              distance: 12,
              city: 'Chennai',
              Team: 'Community memeber',
              email: 'rahul@gmail.com',
            
          }];
        }
    });          