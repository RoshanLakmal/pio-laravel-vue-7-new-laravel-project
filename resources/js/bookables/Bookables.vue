<template>
  <div>
    <div v-if="loading">Data is loading...</div>
    <div v-else>
      <div class="row mb-4" v-for="row in rows" :key="'row'+row">
        <div
          class="col d-flex align-items-stretch"
          v-for="(bookable,columns) in bookablesInRow(row)"
          :key="'row'+row+columns"
        >
          <bookable-list-item
            :item-title="bookable.title"
            :item-description="bookable.description"
            :price="1000"
          ></bookable-list-item>
        </div>
        <!-- {{placeholdersInRow(row)}} -->
        <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder'+row+p"></div>
      </div>
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
      columns: 3,
      //   bookable1: null,
      //   bookable2: null,
    };
  },
  computed: {
    rows() {
      return this.bookables === null
        ? 0
        : Math.ceil(this.bookables.length / this.columns);
    },
  },
  methods: {
    bookablesInRow(row) {
      return this.bookables.slice((row - 1) * this.columns, row * this.columns);
    },
    placeholdersInRow(row) {
      return this.columns - this.bookablesInRow(row).length;
    },
  },
  //   beforeCreate() {
  //     console.log("before create");
  //   },
  created() {
    this.loading = true;
    const request = axios.get("/api/bookables").then((response) => {
      this.bookables = response.data;
      // this.bookables.push({ title: "x", description: "x" });
      this.loading = false;
    });
    // console.log(request);
    // const p = new Promise((resolve, reject) => {
    //   console.log(resolve);
    //   console.log(reject);
    //   setTimeout(() => resolve("Hello"), 3000); // resove promise
    //   // setTimeout(() => reject("Hello"), 3000); // reject promise
    // })
    //   .then((result) => "Hello agin" + result)
    //   .then((result) => console.log(`Success ${result}`))
    //   .catch((result) => console.log(`Error ${result}`));
    // console.log(p);

    // setTimeout(() => {
    //   this.bookables = [
    //     {
    //       title: "Cheap Villa 1",
    //       content: "A very cheap villa 1",
    //     },
    //     {
    //       title: "Cheap Villa 2",
    //       content: "A very cheap villa 2",
    //     },
    //     {
    //       title: "Cheap Villa 1",
    //       content: "A very cheap villa 1",
    //     },
    //     {
    //       title: "Cheap Villa 2",
    //       content: "A very cheap villa 2",
    //     },
    //   ];
    //   this.loading = false;
    // }, 2000);

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
