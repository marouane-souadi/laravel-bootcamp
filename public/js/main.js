
html, body {
    height: 100%;
}

.wrapper {
    display: flex;
    width: 100%;
    height: 100%;
    align-items: stretch;
}

#sidebar {
    width: 15rem;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    z-index: 10;
    /*background: #7386D5;*/
    color: #fff;
    transition: all 0.3s;
    border-right: 2px solid lightgray;
    overflow-x: hidden;
}