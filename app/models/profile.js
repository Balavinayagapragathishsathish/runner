import DS from 'ember-data';

export default DS.Model.extend({    
    title: DS.attr('string'),
    role: DS.attr('string'),
    firstname: DS.attr('string'),
    lastname: DS.attr('string'),
    email: DS.attr('string'),
    mobile: DS.attr('number'),
    city: DS.attr('string'),
    password: DS.attr('string')
});
