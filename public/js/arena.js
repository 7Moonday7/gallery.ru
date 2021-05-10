let scene    = null,
    camera   = null,
    renderer = null,
    controls = null;

init();
render();
animate();

function init() {
    initScene();
    initRenderer();
    initCamera();
    initControls();
    initAreas();
    initCursor();
    initEvents();
}

function initScene() {
    scene = new THREE.Scene();
}

function initRenderer() {
    renderer = new THREE.CSS3DStereoRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.domElement.style.position = 'absolute';
    renderer.domElement.style.top = 0;
    renderer.domElement.style.background = '#343335';
    document.body.appendChild(renderer.domElement);
}

function initCamera() {
    camera = new THREE.PerspectiveCamera(45,
        window.innerWidth/window.innerHeight, 1, 1000);
    camera.position.z = 1000;
    scene.add(camera);
}

function initControls() {
    controls = new DeviceOrientationController(camera, renderer.domElement);
    controls.connect();

    controls.addEventListener('userinteractionstart', function () {
        renderer.domElement.style.cursor = 'move';
    });

    controls.addEventListener('userinteractionend', function () {
        renderer.domElement.style.cursor = 'default';
    });
}

function initAreas() {
    let width = window.innerWidth / 2;

    initArea('.vr-area.-left',   [-width/2 -width/5.64,0,width/5.64], [0,Math.PI/4,0]);
    initArea('.vr-area.-center', [0,0,0], [0,0,0]);
    initArea('.vr-area.-right',  [width/2 + width/5.64,0,width/5.64], [0,-Math.PI/4,0]);
}

function initArea(contentSelector, position, rotation) {
    let element = document.querySelector(contentSelector),
        area = new THREE.CSS3DObject(element);

    area.position.x = position[0];
    area.position.y = position[1];
    area.position.z = position[2];

    area.rotation.x = rotation[0];
    area.rotation.y = rotation[1];
    area.rotation.z = rotation[2];

    scene.add(area);
}


function initCursor() {
    let x1 = window.innerWidth * 0.25,
        x2 = window.innerWidth * 0.75,
        y = window.innerHeight * 0.50,
        element1 = document.body,
        element2 = document.body,
        cursor = document.querySelector('.fake-cursor');

    setInterval(function() {
        if (element1 && element1.classList) {
            element1.classList.remove('-focused');
        }

        if (element2  && element2.classList) {
            element2.classList.remove('-focused');
        }

        element1 = document.elementFromPoint(x1, y);
        element2 = document.elementFromPoint(x2, y);

        if (element1 && element2) {
            while (element1.tabIndex < 0 && element1.parentNode) {
                element1 = element1.parentNode;
            }

            while (element2.tabIndex < 0 && element2.parentNode) {
                element2 = element2.parentNode;
            }

            if (element1.tabIndex >= 0) {
                element1.classList.add('-focused');
            }

            if (element2.tabIndex >= 0) {
                element2.classList.add('-focused');
            }
        }
    }, 100);

    document.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) {
            if (element1 && element2) {
                element1.click();
                element2.click();

                cursor.classList.add('-active');

                setTimeout(function() {
                    cursor.classList.remove('-active');
                }, 100);
            }
        }
    });
}

function initEvents() {
    window.addEventListener('resize', onWindowResize);
}

function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize( window.innerWidth, window.innerHeight );

    render();
}

function animate() {
    controls.update();
    render();
    requestAnimationFrame(animate);
}

function render() {
    renderer.render(scene, camera);
}
