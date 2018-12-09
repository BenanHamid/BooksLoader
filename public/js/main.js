window.onload = function(){
	let formAuthor = document.getElementById("form-books");
	
	const booksResultsElement = document.querySelector(".books-results");

	formAuthor.addEventListener("submit", function(e){
        e.preventDefault();

		let formData = "";
		const inputs = formAuthor.elements;
		booksResultsElement.innerHTML = "";

        for (let i = 0; i < inputs.length; i++) {
	  		formData += inputs[i].name + "=" + inputs[i].value + "&";
		}

        let ajax = new XMLHttpRequest();
		let data = formData, method = 'POST', url = 'functions_traits/books_ajax.php';

		 ajax.onreadystatechange = async function() {
			if (ajax.readyState == 4 && ajax.status == 200) {
				if (ajax.response.length < 1) {
					alert('Няма намерени автори!');

					return;
				}

				let data = JSON.parse(ajax.response);
				let dataString = [];

				for(let i = 0; i < data.length; i++){
					let tmpItem = "";

					for (let key in data[i]) {
			    		if (data[i].hasOwnProperty(key)) {
			    			tmpItem = "Автор: " + data[i].author + " Книга: " + data[i].book_name;
			    		}
			    	}

					dataString.push(tmpItem);
			    }

			    for(let i = 0; i < dataString.length; i++){
					let span = document.createElement('p');

					span.classList.add('author-details');
					span.innerHTML = dataString[i];
					booksResultsElement.appendChild(span);

					await timer(200);
					span.classList.add('horizontal');
					await timer(2000);
			    }
			}
		};

		ajax.open(method, url, true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send(data);
	});
};


function timer(ms) {
	return new Promise(res => setTimeout(res, ms));
}