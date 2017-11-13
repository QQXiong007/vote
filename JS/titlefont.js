Vue.component("anim-word", {
    props: ["text"],
    template: `
    <div>
      <span class="letter" v-for="(letter, index) in text.letters" 
        @click="$emit('poof', text.id, letter.char)"
        v-bind:class="{ poofed: !letter.alive }"
      >
        <div class="character">{{ letter.char }}</div> 
        <span></span>
      </span>
    </div>
    `
  });
  
  new Vue({
    el: "#app",
    data: {
      clickTimes: 0,
      word1: {
        id: 1,
        letters: [
          { char: "畢", alive: true },
          { char: "業", alive: true },
          { char: "旅", alive: true },
          { char: "行", alive: true },
          { char: "投", alive: true },
          { char: "票", alive: true }
        ]
      },
    //   word2: {
    //     id: 2,
    //     letters: [
    //       { char: "d", alive: true },
    //       { char: "e", alive: true },
    //       { char: "l", alive: true },
    //       { char: "i", alive: true },
    //       { char: "r", alive: true },
    //       { char: "i", alive: true },
    //       { char: "u", alive: true },
    //       { char: "m", alive: true }
    //     ]
    //   },
      totalLetters: 0
    },
    mounted() {
      this.totalLetters = this.word1.letters.length; //+ this.word2.letters.length
    },
    methods: {
      rem(id, letter) {
        // update text
        if (!this.clicked) {
          this.clickTimes++;
        }
  
        // word 1
        if (id === 1) {
          this.word1.letters = this.word1.letters.map(function(item) {
            if (item.char == letter) {
              item.alive = false;
            }
            return item;
          });
        } 
        // else if (id === 2) {
        //   word 2
        //   this.word2.letters = this.word2.letters.map(function(item) {
        //     if (item.char === letter && item.alive !== false) {
        //       item.alive = false;
        //       letter = null;
        //     }
        //     return item;
        //   });
        // }
      },
  
      back() {
        // Reset text
        this.clickTimes = 0;
  
        // Restore letter position
        this.word1.letters = this.word1.letters.map(function(item) {
          item.alive = true;
          return item;
        });
        // this.word2.letters = this.word2.letters.map(function(item) {
        //   item.alive = true;
        //   return item;
        // });
      }
    }
  });
  