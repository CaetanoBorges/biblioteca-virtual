const rvLoaderTemplate = document.createElement('template');
rvLoaderTemplate.innerHTML = `
<style>
            .loader{position:fixed;top:0;left:0;width:100%;height:100vh;background-color:#00000099;}
            .loader .img-div{width:323px;display:block;margin:200px auto;}
            .loader  img{width:30px;display:inline-block;margin:10px}
        </style>
        <div class="loader">
            <div class="img-div">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
                <img src="_assets/load.gif" alt="">
            </div>
            
        </div>
`;

class rvLoader extends HTMLElement {

    constructor() {
        super();
        this.attachShadow({ mode: 'open' });
        this.shadowRoot.appendChild(rvLoaderTemplate.content.cloneNode(true));
    }


    connectedCallback() {
        //EVENT LISTEINER
        /*this.shadowRoot.querySelector('.alert').addEventListener('click', () => {
            this.tooltip(true);
        })
        this.shadowRoot.querySelector('.cancel').addEventListener('click', () => {
            this.tooltip(false);
        })*/
    }


}

window.customElements.define('rv-loader', rvLoader);






const rv_loader = {
    "liga": function(){
        this.load = new rvLoader();
        $("html").append(this.load);
    },
    "desliga": function(){
        this.load.remove();
    }
}