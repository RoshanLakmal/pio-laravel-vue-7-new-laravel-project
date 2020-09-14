<template>
  <div>
    <div v-if="loading">Data is loading...</div>
    <div v-else>
      <bookable-list-item
        :item-title="bookable.title"
        :item-content="bookable.content"
        :price="1000"
        v-for="(bookable,index) in bookables"
        :key="index"
      ></bookable-list-item>
    </div>

    <!-- <bookable-list-item
      v-if="bookable1"
      :item-title="bookable1.title"
      :item-content="bookable1.content"
      :price="1000"
    ></bookable-list-item>
    <bookable-list-item
      v-if="bookable2"
      :item-title="bookable2.title"
      :item-content="bookable2.content"
      :price="1500"
    ></bookable-list-item>-->
  </div>
</template>

<script>
import BookableListItem from "./BookableListItem";
export default {
  components: {
    BookableListItem,
  },
  data() {
    return {
      bookables: null,
      loading: false,
      //   bookable1: null,
      //   bookable2: null,
    };
  },
  //   beforeCreate() {
  //     console.log("before create");
  //   },
  created() {
    this.loading = true;
    setTimeout(() => {
      this.bookables = [
        {
          title: "Cheap Villa 1",
          content: "A very cheap villa 1",
        },
        {
          title: "Cheap Villa 2",
          content: "A very cheap villa 2",
        },
      ];
      this.loading = false;
    }, 2000);
    // console.log("created");
    // console.log(this.bookable1);
    // console.log(this.bookable2);
    // setTimeout(() => {
    //   this.bookable1 = {
    //     title: "Cheap Villa 1",
    //     content: "A very cheap villa 1",
    //   };
    //   this.bookable2 = {
    //     title: "Cheap Villa 2",
    //     content: "A very cheap villa 2",
    //   };
    // }, 2000);
  },
  //   beforeMount() {
  //     console.log("before mount");
  //   },
  //   mounted() {
  //     console.log("mounted");
  //   },
  //   beforeDestroy() {
  //     console.log("before destroy");
  //   },
  //   destroyed() {
  //     console.log("destroy");
  //   },
};
</script>
