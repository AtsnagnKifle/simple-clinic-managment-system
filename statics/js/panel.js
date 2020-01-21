// his,lab,med,ref,treat
var H = document.getElementById('his');
var L = document.getElementById('lab');
var M = document.getElementById('med');
var R = document.getElementById('ref');
var T = document.getElementById('treat');

var Hactivator = document.getElementById('his-activator');
var Lactivator = document.getElementById('lab-activator');
var Mactivator = document.getElementById('med-activator');
var Ractivator = document.getElementById('ref-activator');
var Tactivator = document.getElementById('treat-activator');

Hactivator.onclick = function () {
    H.setAttribute('style', 'margin:auto;');
    L.setAttribute('style', 'display:none;');
    M.setAttribute('style', 'display:none;');
    R.setAttribute('style', 'display:none;');
    T.setAttribute('style', 'display:none;');
    Hactivator.classList.add("is-active");
    Lactivator.classList.remove("is-active")
    Mactivator.classList.remove("is-active")
    Ractivator.classList.remove("is-active")
    Tactivator.classList.remove("is-active")
};
Lactivator.onclick = function () {
    L.setAttribute('style', 'margin:auto;');
    H.setAttribute('style', 'display:none;');
    M.setAttribute('style', 'display:none;');
    R.setAttribute('style', 'display:none;');
    T.setAttribute('style', 'display:none;');
    Lactivator.classList.add("is-active");
    Mactivator.classList.remove("is-active")
    Ractivator.classList.remove("is-active")
    Hactivator.classList.remove("is-active")
    Tactivator.classList.remove("is-active")
};
Mactivator.onclick = function () {
    M.setAttribute('style', 'margin:auto;');
    L.setAttribute('style', 'display:none;');
    H.setAttribute('style', 'display:none;');
    R.setAttribute('style', 'display:none;');
    T.setAttribute('style', 'display:none;');
    Mactivator.classList.add("is-active");
    Lactivator.classList.remove("is-active")
    Hactivator.classList.remove("is-active")
    Ractivator.classList.remove("is-active")
    Tactivator.classList.remove("is-active")
};
Ractivator.onclick = function () {
    R.setAttribute('style', 'margin:auto;');
    L.setAttribute('style', 'display:none;');
    M.setAttribute('style', 'display:none;');
    H.setAttribute('style', 'display:none;');
    T.setAttribute('style', 'display:none;');
    Ractivator.classList.add("is-active");
    Lactivator.classList.remove("is-active")
    Mactivator.classList.remove("is-active")
    Hactivator.classList.remove("is-active")
    Tactivator.classList.remove("is-active")
};
Tactivator.onclick = function () {
    T.setAttribute('style', 'margin:auto;');
    R.setAttribute('style', 'display:none;');
    L.setAttribute('style', 'display:none;');
    M.setAttribute('style', 'display:none;');
    H.setAttribute('style', 'display:none;');
    Tactivator.classList.add("is-active");
    Ractivator.classList.remove("is-active");
    Lactivator.classList.remove("is-active")
    Mactivator.classList.remove("is-active")
    Hactivator.classList.remove("is-active")
};
var lists = ['abcd', 'efgh', 'ijkl', 'mnop'];

var select_lab_requests = document.getElementById('selector');

lists.forEach((a) => {
    select_lab_requests.innerHTML = select_lab_requests.innerHTML + "\n" + "<option value=\"" + a + "\">" + a + "</option>";
});


var add_button = document.getElementById("add_button");

var lab_reports = document.getElementById("lab_reports");

// lab_reports.innerHTML = lab_reports.innerHTML + ;

function selected(event)
{
    console.log(event);
    
    /*
        remove selected value from input list
     */
    var selected_div = document.createElement("div");
    selected_div.setAttribute('class','field has-addons');

    var selected_val = document.createElement("input");
    selected_val.setAttribute('class','input'); 
    selected_val.toggleAttribute('disabled');
    selected_val.setAttribute('type','text');

    var controlled_selected_val = document.createElement('div');
    controlled_selected_val.setAttribute('class','control is-expanded');
    controlled_selected_val.appendChild(selected_val);

    var selected_button = document.createElement('button');
    selected_button.setAttribute('class','button is-danger');
    selected_button.innerHTML = 'Del';

    var controlled_selected_button = document.createElement('div');
    controlled_selected_button.setAttribute('class','control');
    controlled_selected_button.appendChild(selected_button);
    controlled_selected_button.onclick = (event)=>{
        var new_val = event.target.parentElement.parentElement.children[0].children[0];
        lists.push(new_val.value);
        var lab_div = document.getElementById('selector');
        var new_option = document.createElement('option');
        new_option.setAttribute('value',new_val.value);
        new_option.innerHTML = new_val.value;
        lab_div.append(new_option);
        event.target.parentElement.parentElement.remove();
    }

    selected_div.appendChild(controlled_selected_val);
    selected_div.appendChild(controlled_selected_button);

    var lab_div = document.getElementById('selected');
    lab_div.appendChild(selected_div);

    var options = event.target.parentElement.parentElement.children[0].children[0].children;

    for(var i=0;i<options.length;i++)
    {
        if(i==options[i].parentElement.selectedIndex)
        {
            selected_val.setAttribute('value',lists[i]);
            options[i].remove();
            lists.splice(i,1);
            break;
        }


    }


}

