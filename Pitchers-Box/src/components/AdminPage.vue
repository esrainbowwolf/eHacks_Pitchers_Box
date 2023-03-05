<template>
  <v-container class="fill-height">
    <v-responsive class="d-flex fill-height">
      <v-row class="d-flex align-center justify-center"
        ><!--row 1-->

        <v-col cols="d-flex align-left justify-left">
          <v-responsive class="mx-auto" max-width="900">
            <v-text-field
              label="Game"
              variant="solo"
              placeholder="Opposing Team"
              v-model="gameOpposing"
              disabled
            ></v-text-field>
          </v-responsive>
        </v-col>

        <v-col cols="d-flex align-right justify-right">
          <v-responsive class="mx-auto" max-width="200">
            <v-text-field
              label="Date"
              variant="solo"
              v-model="gameDate"
              disabled
            ></v-text-field>
          </v-responsive>
        </v-col>
        <v-col cols="d-flex align-right justify-right">
          <v-responsive class="mx-auto" max-width="200">
            <v-text-field
              label="Time"
              variant="solo"
              v-model="gameTime"
              disabled
            ></v-text-field>
          </v-responsive>
        </v-col>
      </v-row>
      <v-row class="d-flex align-center justify-center">
        <!--row 2-->

        <v-col cols="d-flex align-left justify-left">
          <v-responsive class="mx-auto" max-width="500">
            <div class="text-center">
              <v-select
                :v-model="Pitcher"
                :items="Pitchers"
                label="Pitcher"
              ></v-select>
            </div>
          </v-responsive>
        </v-col>

        <v-col cols="d-flex align-left justify-left">
          <v-responsive class="mx-auto" max-width="500">
            <div class="text-center">
              <v-select
                :v-model="Batter"
                :items="Batters"
                label="Batter"
              ></v-select>
            </div>
          </v-responsive>
        </v-col>
      </v-row>
      <v-row class="d-flex align-center justify-center"
        ><!--row 3-->

        <v-col cols="d-flex align-left justify-left">
          <v-responsive class="mx-auto" max-width="500">
            <div class="text-center">
              <v-select
                :v-model="Pitch"
                :items="Pitches"
                label="Pitch Type"
              ></v-select>
            </div>
          </v-responsive>
        </v-col>

        <v-col cols="auto">
          <v-container fluid>
            <v-row>
              <v-checkbox
                v-model="checkbox"
                :label="`In the zone`"
                v-on:click="check_one(checkbox)"
              ></v-checkbox>
              <v-checkbox
                v-model="checkbox2"
                :label="`Out of the zone`"
                v-on:click="check_one(checkbox2)"
              ></v-checkbox>
            </v-row>
          </v-container>
        </v-col>
      </v-row>
      <v-row class="d-flex align-center justify-center"
        ><!--row 4-->
        <v-col cols="d-flex align-left justify-left">
          <v-responsive class="mx-auto" max-width="500">
            <div class="text-center">
              <v-select
                :v-model="Zone"
                :items="Zones"
                label="Pitch Zones"
              ></v-select>
            </div>
          </v-responsive>
        </v-col>
        <v-col cols="d-flex align-left justify-left">
          <v-row>
            <v-responsive class="mx-auto" max-width="100">
              <div class="text-body-2 font-weight-light mb-n1">
                Did batter swing?
              </div>
            </v-responsive>
            <v-col cols="d-flex align-left justify-left">
              <v-checkbox
                v-model="ball"
                :label="`No, called ball`"
                v-on:click="swing(ball)"
              ></v-checkbox>
              <v-checkbox
                v-model="strike"
                :label="`No, called strike`"
                v-on:click="swing(strike)"
              ></v-checkbox>
              <v-checkbox
                v-model="miss"
                :label="`Yes, swing and miss`"
                v-on:click="swing(miss)"
              ></v-checkbox>
              <v-checkbox
                v-model="foul"
                :label="`Yes, foul ball`"
                v-on:click="swing(foul)"
              ></v-checkbox>
              <v-checkbox
                v-model="bip"
                :label="`Yes, ball in play`"
                v-on:click="swing(bip)"
              ></v-checkbox>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row class="d-flex align-center justify-center">
        <!--row 5-->
        <v-btn color="red" size="large" v-on:click="submitPitch()"
          >Submit Pitch</v-btn
        >
      </v-row>
      <v-row class="d-flex align-center justify-center">
        <!--row 6-->
        <v-col cols="d-flex align-right justify-right">
          <v-responsive class="mx-auto" max-width="200">
            <v-text-field label="At Bat result" variant="solo"></v-text-field>
          </v-responsive>
        </v-col>
        <v-col cols="d-flex align-right justify-right">
          <v-btn color="red" size="large" v-on:click="submitBat()"
            >Submit At Bat</v-btn
          >
        </v-col>
      </v-row>
    </v-responsive>
  </v-container>
</template>
<style scoped>
.txt-black.v-label {
  color: black !important;
}
</style>
<script>
export default {
  data: () => ({
    gameOpposing: "",
    gameData: new Date(),
    gameTime: new Date().toLocaleTimeString(),
    game: [],
    checkbox: true,
    checkbox2: false,
    ball: true,
    strike: false,
    miss: false,
    foul: false,
    bip: false,
    Pitchers: [],
    Batters: [],
    Pitches: [],
    Zones: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
  }),
  methods: {
    check_one(check) {
      if (check == this.checkbox) {
        this.checkbox2 = false;
      } else {
        this.checkbox = false;
      }
    },
    swing(swingResult) {
      if (swingResult == this.ball) {
        this.strike = false;
        this.miss = false;
        this.foul = false;
        this.bip = false;
      } else if (swingResult == this.strike) {
        this.ball = false;
        this.miss = false;
        this.foul = false;
        this.bip = false;
      } else if (swingResult == this.miss) {
        this.strike = false;
        this.ball = false;
        this.foul = false;
        this.bip = false;
      } else if (swingResult == this.foul) {
        this.strike = false;
        this.miss = false;
        this.ball = false;
        this.bip = false;
      } else {
        this.strike = false;
        this.miss = false;
        this.foul = false;
        this.ball = false;
      }
    },
    submitPitch() {},
    submitBat() {},
  },
  async mounted() {
    const resp = await fetch("/api/pbd", {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });
    const data = await resp.json();
    for (let i = 0; i < data.pitchers.length; i++) {
      this.Pitchers.push(data.pitchers[i].name);
    }
    for (let i = 0; i < data.batters.length; i++) {
      this.Batters.push(data.batters[i].name);
    }

    this.gameOpposing = data.opposingTeam;
    this.gameDate = data.gameDate;
    this.gameTime = data.gameTime;
  },
};
</script>
