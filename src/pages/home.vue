<template>
  <div class='page'>
    <div class='home-carousel'>

      <div class='slide1'>
        <div class='overlay flex'>
          <h3 class='w100'>Automated. Minimal. Secure.</h3>

          <div class='box w30 flex'>
            <div>Modern Technologies</div>
            <div>Efficient design</div>
            <div>Test Driven Development</div>
            <div>Distributed Computing</div>
            <div>API Integration</div>
          </div>

          <div class='box w30'>
            <p>
              Producing exceptional quality and future resistant systems that will grow along-side your business
            </p>
          </div>
        </div>

        <img src='../assets/images/workstation.png'>
      </div>

      <div class='slide2'>
        <div class='overlay flex'>
          <h3 class='w50'>Fullstack Web Development</h3>

          <div class='box w40'>
            <p>
              Producing exceptional quality and future resistant systems that will grow along-side your business
            </p>
          </div>
        </div>

        <img src='../assets/images/browserkids.jpg' />
      </div>

      <div class='slide3'>
        <img src='../assets/images/devices.png' />
        <h3>Hello 3</h3>
      </div>

    </div>
  </div>
</template>

<script>
  export default {
    name: 'home'
  };
</script>

<style lang='less'>
@import '../less/variables.less';

.home-carousel {
  height:100%;
  width:100%;

  .slick-slide {
    .overlay {
      position:absolute;
      padding-top:30px;
      padding-bottom:35px;
      padding-left:50px;
      padding-right:50px;
      width:inherit;
      height:inherit;

      .height-tiny({
        padding-top:0px;
        padding-bottom:0px;

        h3 {
          margin-top:0px;
        }
      });

      .box {
        height:75%;
        margin-top:40px;

        .height-small({
          margin-top:0px;
        });

        ul {
          padding-left:0px;
          list-style-type: none;

          li {
            padding-bottom:20px;

            .height-medium({
              padding-bottom:0px;
            });
          }
        }

        &.left {
          padding-left:20px;
        }
        &.right {
          padding-left:30px;
        }
        &.flex {
          div {
            width:100%;
            font-size:1.5em;
          }
        }
      }
    }
    img {
      height:inherit;
      width:100%;
    }
  }

  .slide2 {
    color:@color-black;
  }
  .slick-prev:before, .slick-next:before {
    color:@color-black;
  }
  .slick-list, .slick-track, .slick-slide {
    height:inherit;
  }
  .slick-prev {
    z-index:1;
    left:15px;
  }
  .slick-next {
    right:15px;
  }
}
</style>
