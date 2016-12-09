

(function(){
	document.addEventListener("deviceready", init, false);
	function init() {
		document.getElementById("contact").onclick=function(){
			navigator.contacts.pickContact(function(contact){
				alert('The following contact has been selected:' + JSON.stringify(contact));
				document.getElementById("tel").value=contact.phoneNumbers[0].value;
			},function(err){
				console.log('Error: ' + err);
			});

		}
	};
})();

(function() {
	$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
  }
  );
	$('.collapsible').collapsible();
	
})();


