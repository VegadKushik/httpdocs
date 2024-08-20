var $ = jQuery;

function triggerCartUpdate() {
    console.log('triggerCartUpdate')
    jQuery('body').find('button[name="update_cart"]').click();
}

jQuery(function ($) {
    $('div.map a[href="#"]').on('click', function (e) {
        e.preventDefault();
    })

    setTimeout(()=>{
        $('.bar p').height($('.bar').data('percent'))
    })
})

document.addEventListener('DOMContentLoaded', function () {
    var svg = document.querySelector("#svg");
    var reset = document.querySelector("#reset");
    var proxy = document.createElement("div");
    var viewport = document.querySelector("#viewport");

    var rotateThreshold = 4;
    var reachedThreshold = false;

    if (svg) {
        var point = svg.createSVGPoint();
        var startClient = svg.createSVGPoint();
        var startGlobal = svg.createSVGPoint();

        var viewBox = svg.viewBox.baseVal;

        var cachedViewBox = {
            x: viewBox.x,
            y: viewBox.y,
            width: viewBox.width,
            height: viewBox.height
        };

        var zoom = {
            animation: new TimelineLite(),
            scaleFactor: 1.6,
            duration: 0.5,
            ease: Power2.easeOut,
        };

        var resetAnimation = new TimelineLite();

        var pannable = new Draggable(proxy, {
            throwResistance: 3000,
            trigger: svg,
            throwProps: true,
            // onPress: selectDraggable,
            onDrag: updateViewBox,
            onThrowUpdate: updateViewBox,
        });

        var rotatable = new Draggable(viewport, {
            type: "rotation",
            trigger: svg,
            throwProps: true,
            liveSnap: true,
            snap: checkThreshold,
            onPress: selectDraggable,
        });

        rotatable.disable();

        reset.addEventListener("click", resetViewport);
        $('.minus').on('click', () => {
            onWheel2(-150);
        });
        $('#svg').on('click', function () {
            console.log('click')
        })
        $('.plus').on('click', () => {
            onWheel2(150);
        });
    }

    function onWheel2(delta) {

        var normalized;

        if (delta) {
            normalized = (delta % 120) === 0 ? delta / 120 : delta / 12;
        }

        var scaleDelta = normalized > 0 ? 1 / zoom.scaleFactor : zoom.scaleFactor;

        point.x = window.innerWidth / 2;
        point.y = window.innerHeight / 2;

        console.log(point.x, point.y)

        var startPoint = point.matrixTransform(svg.getScreenCTM().inverse());

        var fromVars = {
            ease: zoom.ease,
            x: viewBox.x,
            y: viewBox.y,
            width: viewBox.width,
            height: viewBox.height,
        };

        viewBox.x -= (startPoint.x - viewBox.x) * (scaleDelta - 1);
        viewBox.y -= (startPoint.y - viewBox.y) * (scaleDelta - 1);
        viewBox.width *= scaleDelta;
        viewBox.height *= scaleDelta;

        zoom.animation = TweenLite.from(viewBox, zoom.duration, fromVars);
    }

//
// SELECT DRAGGABLE
// ===========================================================================
    function selectDraggable(event) {
        console.log(event)

        if (resetAnimation.isActive()) {
            resetAnimation.kill();
        }

        startClient.x = this.pointerX;
        startClient.y = this.pointerY;
        startGlobal = startClient.matrixTransform(svg.getScreenCTM().inverse());

        // Right mouse button
        if (event.button === 2) {

            reachedThreshold = false;

            TweenLite.set(viewport, {
                svgOrigin: startGlobal.x + " " + startGlobal.y
            });

            pannable.disable();
            rotatable.enable().update().startDrag(event);
        } else {

            TweenLite.set(proxy, {
                x: this.pointerX,
                y: this.pointerY
            });

            rotatable.disable();
            pannable.enable().update().startDrag(event);
        }
    }

//
// RESET VIEWPORT
// ===========================================================================
    function resetViewport() {

        var duration = 0.8;
        var ease = Power3.easeOut;

        if (pannable.tween) {
            pannable.tween.kill();
        }

        if (rotatable.tween) {
            rotatable.tween.kill();
        }

        resetAnimation.clear()
            .to(viewBox, duration, {
                x: cachedViewBox.x,
                y: cachedViewBox.y,
                width: cachedViewBox.width,
                height: cachedViewBox.height,
                ease: ease
            }, 0)
            .to(viewport, duration, {
                attr: {transform: "matrix(1,0,0,1,0,0)"},
                // rotation: "0_short",
                smoothOrigin: false,
                svgOrigin: "0 0",
                ease: ease
            }, 0)
    }

//
// CHECK THRESHOLD
// ===========================================================================
    function checkThreshold(value) {

        if (reachedThreshold) {
            return value;
        }

        var dx = Math.abs(this.pointerX - startClient.x);
        var dy = Math.abs(this.pointerY - startClient.y);

        if (dx > rotateThreshold || dy > rotateThreshold || this.isThrowing) {
            reachedThreshold = true;
            return value;
        }

        return this.rotation;
    }

//
// UPDATE VIEWBOX
// ===========================================================================
    function updateViewBox() {

        if (zoom.animation.isActive()) {
            return;
        }

        point.x = this.x;
        point.y = this.y;

        var moveGlobal = point.matrixTransform(svg.getScreenCTM().inverse());

        viewBox.x -= (moveGlobal.x - startGlobal.x);
        viewBox.y -= (moveGlobal.y - startGlobal.y);
    }

    // $(".bar").each(function () {
    //     var length = $(this).data('percent');
    //     $(this).find("p").delay(100).animate({'height': length}, 9000, function () {
    //
    //     });
    // });

    var imageSrc = $('.page-id-276 .parallax-container').attr('data-image-src');
    $('.page-id-276 .parallax-container').css('background-image', 'url("' + imageSrc + '")');
})
