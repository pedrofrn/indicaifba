const currYear = (new Date()).getFullYear();
const spanCurrYear = document.querySelector('span.currYear');
spanCurrYear.innerText = currYear;

const divMenuHamburguer = document.querySelector('header div.listMenu');
const hambuguerCheckbox = document.querySelector(".menuHamburguer input[type='checkbox']");
const divPesquisar = document.querySelector('div.pesquisar');
const formPesquisa = document.querySelector('div.pesquisar form');
const inputTypePesquisa = document.querySelector("div.pesquisar input[type='search']");
const inputLupa = document.querySelector("div.pesquisar input[type='submit']");
formPesquisa.classList.add('displayNone');
const searchLupa = document.querySelector('span.lupa');
const svgLupa = "<svg fill='none' stroke='currentColor' stroke-width='1.5' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z'></path></svg>";
const buttonLupa = document.createElement("button");
buttonLupa.type = 'submit';
inputTypePesquisa.parentNode.insertBefore(buttonLupa, inputTypePesquisa.nextSibling);
buttonLupa.innerHTML = svgLupa;
searchLupa.innerHTML = svgLupa;
inputLupa.value = '';

const linkDoc = document.querySelectorAll('#linkDoc');
const divSufixo = document.querySelectorAll('.sufixodoc');

for (let n = 0; n < linkDoc.length; n++) {
    const hrefLink = linkDoc[n].href;
    const splitHref = hrefLink.split('.');
    const contagemSplit = Number(splitHref.length);
    divSufixo[n].innerText = hrefLink.split('.')[contagemSplit - 1].toUpperCase();
}

hambuguerCheckbox.addEventListener('click', () => {
    if (hambuguerCheckbox.checked) {
        divMenuHamburguer.style.display = 'flex';
        searchLupa.classList.add('displayNone');
    }
    else {
        divMenuHamburguer.style.display = 'none';
        searchLupa.classList.remove('displayNone');
    }
})

searchLupa.addEventListener('click', () => {
    if (formPesquisa.classList.contains('displayNone')) {
        divPesquisar.style.display, formPesquisa.style.display = 'flex';
        divPesquisar.style.flex = '2';
        formPesquisa.classList.remove('displayNone');
        searchLupa.classList.add('displayNone');
    }
})

function docSearch() {
    let q = document.getElementById("q");
    let v = q.value.toLowerCase();
    let rows = document.getElementsByClassName("docSingle");
    let on = 0;
    for (let i = 0; i < rows.length; i++) {
        let fullname = rows[i].getElementsByClassName("linkDoc");

        fullname = fullname[0].innerHTML.toLowerCase();
        if (fullname) {
            if (v.length == 0 || (v.length < 3 && fullname.indexOf(v) == 0) || (v.length >= 3 && fullname.indexOf(v) > -1)) {
                rows[i].style.display = "";
                on++;
            } else {
                rows[i].style.display = "none";
            }
        }
    }
    let n = document.getElementById("noresults");
    if (on == 0 && n) {
        n.style.display = "";
        document.getElementById("qt").innerHTML = q.value;
    } else {
        n.style.display = "none";
    }
}

(() => {
	const nomeWPForm = document.querySelector('.nomeWPForm input');
	const emailWPForm = document.querySelector('.emailWPForm input');
	const mensagemWPForm = document.querySelector('.mensagemWPForm textarea');
	
	nomeWPForm.placeholder = 'Digite seu nome';
	emailWPForm.placeholder = 'Digite seu e-mail';
	mensagemWPForm.placeholder = 'Seu comentário ou mensagem...';
})();