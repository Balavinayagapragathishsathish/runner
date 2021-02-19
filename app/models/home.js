import DS from 'ember-data';

export default DS.Model.extend({
  title: DS.attr(),
  distance: DS.attr(),
  city: DS.attr(),
  Email: DS.attr(),
});