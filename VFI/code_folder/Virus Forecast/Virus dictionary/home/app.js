const select = document.querySelector(".select")
const select_btn = select.querySelector(".select-btn")
const options = select.querySelector(".options")
const search_country = document.getElementById("search-country")
var option = document.getElementsByClassName("option")
fetch("https://api.covid19api.com/summary")
    .then((repose) => repose.json())
    .then(function (data) {
        if (data.Message != "Caching In progress") {
            console.log(data);
            printcountry(data)
            document.getElementById("con-total").innerText = data.Global.TotalConfirmed
            document.getElementById("con-today").innerText = data.Global.NewConfirmed
            document.getElementById("dea-total").innerText = data.Global.TotalDeaths
            document.getElementById("dea-today").innerText = data.Global.NewDeaths
        }
    })
function printcountry(e) {
    var country = e.Countries
    var country_arr = []
    console.log("lol".toLowerCase());
    console.log(country);

    for (let i = 0; i < country.length; i++) {
        country_arr.push(country[i].Country)
        let data = country[i - 1]
        var html = ` <li class = 'option'value='${country[i].Country}'>${country[i].Country}</li>`
        document.getElementsByClassName("options")[0].insertAdjacentHTML("beforeend", html)
        option[i].addEventListener("click", () => {
            handleClick(option[i], e, data, 'single')
        })
    }
    search_country.addEventListener("keyup", function () {
        let searchval = search_country.value
        var list = country_arr.filter(data => {
            String(data)
            return data.includes(searchval)
        })
        options.innerHTML = list.map(data => `<li class = 'option' value='${data}'>${data}</li>`).join("") ? list.map(data => `<li class = 'option' value='${data}'>${data}</li>`).join("") : `<p>Oops! Country not found</p>`
        handleClick(list, e, null, 'array')
    })

}
function handleClick(dataList, e, datacountry, type) {
    
    console.log(type);
    if (type == 'single') {
        select_btn.firstElementChild.innerText = dataList.innerText
        if (dataList.innerText == "World") {
            document.getElementById("con-total").innerText = e.Global.TotalConfirmed
            document.getElementById("con-today").innerText = e.Global.NewConfirmed
            document.getElementById("dea-total").innerText = e.Global.TotalDeaths
            document.getElementById("dea-today").innerText = e.Global.NewDeaths
        } else {
            document.getElementById("con-total").innerText = datacountry.TotalConfirmed
            document.getElementById("con-today").innerText = datacountry.NewConfirmed
            document.getElementById("dea-total").innerText = datacountry.TotalDeaths
            document.getElementById("dea-today").innerText = datacountry.NewDeaths
        }
    }else {
        for(let i = 0; i < dataList.length;i++){
            data = e.Countries[i - 1]
            console.log(data);
            option[i].addEventListener("click", function(){
                handleClick(option[i], e, data, 'single')
            })
        }
    }

}


//select

select_btn.addEventListener("click", function () {
    select.classList.toggle("active")
})
function updatename(e) {
    select_btn.firstElementChild.innerText = e.innerText;
}