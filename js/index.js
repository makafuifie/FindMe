

(function(){
	document.addEventListener("deviceready", init, false);
	function init() {
		alert("hello");
		navigator.contacts.find([navigator.contacts.fieldType.displayName],gotContacts,errorHandler);
	}
	function errorHandler(e) {
		console.log("errorHandler: "+e);
	}

	function gotContacts(c) {
		console.log("gotContacts, number of results "+c.length);

		mobileDiv = document.querySelector("#mobile");
		emailDiv = document.querySelector("#email");

		/* Retriving phoneNumbers */
		for(var i=0, len=c.length; i<len; i++) {
			if(c[i].phoneNumbers && c[i].phoneNumbers.length > 0) {
				mobileDiv.innerHTML += "<p>"+c[i].displayName+"<br/>"+c[i].phoneNumbers[0].value+"</p>";
			}
		}

		/* Retriving Email */
		for(var i=0, len=c.length; i<len; i++) {
			if(c[i].emails && c[i].emails.length > 0) {
				emailDiv.innerHTML += "<p>"+c[i].emails[0].value+"</p>";
			}
		}
	}
})();

(function() {
	$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
  }
  );
	$('.collapsible').collapsible();
	
})();


