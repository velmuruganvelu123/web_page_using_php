class MyHeader extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
    <header>
        <div class="container">
            <div class="row px-2">                 
                <div class="col-12 col-md-12 col-sm-12 ">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <a class="navbar-brand">
                                    <img src="/img/2639973.jpg" alt="Avatar Logo" style="width:40px;"> 
                            </a> 
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="navbar-collapse collapse  " id="navbarTogglerDemo02">
                                <ul class="navbar-nav ms-auto ">
                                        <li class="nav-item">
                                        <a class="nav-link text-dark" href="http://127.0.0.1:5500/web.html#">Home</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link text-dark" href="http://127.0.0.1:5500/about.html">About</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link text-dark" href="http://127.0.0.1:5500/contact.html">Contact</a>
                                        </li>
                                </ul>      
                            </div>
                        </div>
                    </nav>
                </div>             
            </div>
        </div>
    </header>
    `
    }
}
customElements.define('my-header', MyHeader)

class Myfooter extends HTMLElement {
    connectedCallback(){
        this.innerHTML = `
    <footer>
        <div class="container text-bg-primary">
            <div class="row  pb-2 pt-2 ">
                <div class="col-12 col-md-7 col-sm-2 pt-3">
                    <h3>Get connected with us on social networks:</h3>
                </div>
                <div class="col pt-3 d-flex justify-content-end">
                    <img src="img/icons8-facebook-50.png" alt="">
                    <img src="img/icons8-instagram-50.png" alt="">
                    <img src="img/icons8-twitter-bird-50.png" alt="">
                    <img src="img/icons8-linkedin-50.png" alt="">
                </div>
            </div>
            <div class="row pt-3  text-bg-secondary justify-content-between">
                <div class="col-12 col-md-3 col-sm-2  ">
                    <h4>Explore</h4>
                    <p>Countries</p>
                    <p>Cities</p>
                    <P>Regions</P>
                    <p>Inspiration</p>
                    <p>Trending Tours</p>
                </div>
                <div class="col-12 col-md-3 col-sm-3 ">
                    <h4>Booking</h4>
                    <p>Book Now</p>
                    <p>Deals & Rewards</p>
                    <p>Car Rentals</p>
                    <p>Sign in/Register</p>
                    <p>My account</p>
                </div>
                <div class="col-12 col-md-3 col-sm-3 ">
                    <h4>Company</h4>
                    <p>Career</p>
                    <p>Our story</p>
                    <p>Partners</p>
                    <p>Press</p>
                </div>
                <div class="col-12 col-md-3 col-sm-3 ">
                    <h4>Support</h4>
                    <p>Contact</p>
                    <p>Live chat</p>
                    <p>FQA</p>
                    <P>Report & issues</P>
                </div>
            </div>
            <div class="row text-bg-dark pt-3 pb-2">
                <div class="col-12 col-md-6 col-sm-3 d-flex justify-content-start col-md-4">
                    <p>@2023 ExploreMore. All right reserved.</p>
                </div>
                <div class="col-12 col-md-6  col-sm-3 d-flex justify-content-end">
                    <nav >
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="text-decoration-none text-bg-dark" href="#">Term &
                                    Policy</a></li>
                            <li class="list-inline-item"><a class="text-decoration-none text-bg-dark" href="#">Privacy &
                                    Policy</a></li>
                            <li class="list-inline-item"><a class="text-decoration-none text-bg-dark" href="#">Cookies &
                                    Policy</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    `
    }
}
customElements.define('my-footer', Myfooter)


