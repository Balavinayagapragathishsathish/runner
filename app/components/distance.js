import Ember from 'ember';

export default Ember.Component.extend({
    actions:{
        showpopup(number){
            var uname=localStorage.getItem("uname");
            var url="http://localhost/runner/distance.php";
            url = url + "?uname=" + uname;
            url = url + "&distance=" + number;
            location.replace(url); 
        }
    }
})
