Vue.config.devtools = true;


var app = new Vue (
  {
    el: "#root",
    data:{
      rooms: [],
      roomDetail: null,
    },
    mounted() {
      axios.get(`http://localhost/PHP/DbHotel/db-hotel/dist/php/stanze.php`)
      .then((response) => {
        this.rooms = response.data.response;
      });
    },
    methods: {
      getDetails: function (id) {
        axios.get(`http://localhost/PHP/DbHotel/db-hotel/dist/php/stanze.php?id=${id}`)
        .then((response) => {
          this.roomDetail = response.data.response[0];
        });
      }
    },
  }
);
