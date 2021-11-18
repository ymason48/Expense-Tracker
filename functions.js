//declaring constant variables to get the elements by ID
const list = document.getElementById("list");
const form = document.getElementById("form");
const text = document.getElementById("text");
const amount = document.getElementById("amount");
const balance = document.getElementById("balance");
const incoming = document.getElementById("income");
const outgoing = document.getElementById("expense");


//to check if there are saved datas in local storage to show to users 
let entry_list = JSON.parse(localStorage.getItem("entry_list")) || []; 
updateAmounts();

// To add transaction
function Addtransactions(ev) {
  ev.preventDefault();  // To stop the form from submitting 

  if (!text.value || !amount.value) return;
  else {
    const transaction = {
      id: Date.now(), text: text.value, amount: +amount.value,
    };

    entry_list.push(transaction);
    AddtransactionHistory(transaction);
    updateAmounts();
    localStorage.setItem("entry_list", JSON.stringify(entry_list)); //to save the lists in localstorage in string

  }
}

// history
function AddtransactionHistory(transaction) {
  // For the signs + and -
  const sign = transaction.amount < 0 ? "-" : "+";
  
  const item = document.createElement("li");

  // To add class based on value
  item.classList.add(transaction.amount < 0 ? "subtraction" : "addition");
 
  item.innerHTML = `
    ${transaction.text} ${sign}${Math.abs(
    transaction.amount
  )} <button class="cancel-btn" onclick="Delete_entry(${
    transaction.id
  })">X</button>
  `;
  
  list.appendChild(item);
  
 
}


// To update the balance, income and expense
function updateAmounts() {

   const amounts = entry_list.map((transaction) => transaction.amount);

   const sum = amounts.reduce((balan, value) => (balan = balan + value), 0).toFixed(2); //balance 
   
   const income = amounts.filter((value) => value > 0) .reduce((balan, value) => (balan = balan + value), 0).toFixed(2); //income
  
   const expense = amounts.filter((value) => value < 0).reduce((balan, value) => (balan = balan + value), 0) * -(1).toFixed(2); //expense 
 

  balance.innerText = `$${sum}`;
  incoming.innerText = `$${income}`;
  outgoing.innerText = `$${expense}`;
}

// To emove transaction
function Delete_entry(id) {
  entry_list = entry_list.filter((transaction) => transaction.id !== id);


  localStorage.setItem("entry_list", JSON.stringify(entry_list));

  begin();
}

function calculatetotal (type, list){
	let add = 0;
	list.forEach(i => {
		if(i.type == type) {
			add +=i.amount;
		}
	})
	
	return add;
}
function caluclatebalance (incoming, outgoing){
	return incoming - outgoing;
}


// Start function
function begin() {
  list.innerHTML = "";
  entry_list.forEach(AddtransactionHistory);
  updateAmounts();
  
}

begin();

form.addEventListener("click", Addtransactions);




