Meteor.publish(null, function() {
  if (!this.userId) {
    return this.ready();
  }
  return Meteor.users.find(this.userId, {fields: {storage: 1}});
});