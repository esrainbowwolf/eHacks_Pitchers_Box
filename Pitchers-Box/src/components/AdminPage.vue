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
      <v-row class="d-flex align-left justify-left">
        <!--row 2-->
        <v-col class="align-left">
          <v-img
            contain
            width="300"
            height="125"
            src="@/assets/PitchersBox.png"
          />
        </v-col>
        <v-col>
          <v-responsive class="align-left" max-width="500">
            <div class="text-center">
              <v-select
                v-model="Pitcher"
                :items="Pitchers"
                label="Pitcher"
              ></v-select>
            </div>
          </v-responsive>
        </v-col>

        <v-col cols="d-flex align-right justify-right">
          <v-responsive class="pl-5" max-width="500">
            <div class="text-center">
              <v-select
                v-model="Batter"
                :items="Batters"
                label="Batter"
              ></v-select>
            </div>
          </v-responsive>
        </v-col>
      </v-row>
      <v-row class="d-flex align-center justify-center"
        ><!--row 3-->
        <v-col></v-col>

        <v-col cols="d-flex align-left justify-left">
          <v-responsive class="align left" max-width="700">
            <div class="text-center">
              <v-select
                v-model="Pitch"
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
                class="mr-5"
                v-model="checkbox"
                :label="`In the zone`"
                v-on:click="check_one(checkbox)"
              ></v-checkbox>
              <v-checkbox
                class="ml-5"
                v-model="checkbox2"
                :label="`Out of the zone`"
                v-on:click="check_one(checkbox2)"
              ></v-checkbox>
            </v-row>
          </v-container>
        </v-col>
        <v-col></v-col>
      </v-row>
      <v-row class="d-flex align-center justify-center"
        ><!--row 4-->
        <v-col cols="d-flex align-left justify-left">
          <v-img contain height="300" src="@/assets/MLBPitchLocation.png" />
        </v-col>
        <v-col cols="d-flex align-left justify-left">
          <v-responsive class="align-left" max-width="200">
            <div class="text-center">
              <v-select
                v-model="Zone"
                :items="Zones"
                label="Pitch Zones"
              ></v-select>
            </div>
          </v-responsive>
          <v-row> <br /></v-row>
        </v-col>
        <v-col cols="d-flex align-left justify-left">
          <v-responsive class="align-left" max-width="200">
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
              v-model="bip"
              :label="`Yes, ball in play`"
              v-on:click="swing(bip)"
            ></v-checkbox>
            <v-checkbox
              v-model="foul"
              :label="`Yes, foul ball`"
              v-on:click="swing(foul)"
            ></v-checkbox>
          </v-col>
        </v-col>
      </v-row>
      <v-col>
        <v-row class="d-flex align-center justify-center">
          <!--row 5-->
          <v-btn
            color="#d9001e"
            style="color: #fff; border: #333 thin solid"
            size="large"
            v-on:click="
              submitPitch(Pitcher, Batter, Pitch, Zone, inoutZone, didSwing)
            "
            >Submit Pitch</v-btn
          >
        </v-row>
        <br />
        <v-row>
          <br />
        </v-row>
        <v-divider class="border-opacity-100" :thickness="5"></v-divider
        ><!--row 6-->
        <br />
        <br />
      </v-col>
      <v-col class="d-flex align-center justify-center">
        <v-row class="d-flex align-center justify-center">
          <v-responsive class="align-center" max-width="200">
            <v-text-field
              label="At Bat result"
              variant="solo"
              v-model="atBat"
            ></v-text-field>
          </v-responsive>
        </v-row>
        <v-row class="d-flex align-center justify-center">
          <v-btn
            color="#d9001e"
            style="color: #fff; border: #333 thin solid"
            size="large"
            class="fixM"
            @click="submitBat(Pitcher, Batter, atBat)"
            >Submit At Bat</v-btn
          >
        </v-row>
      </v-col>
    </v-responsive>
    <snackBar :snackbar="snackbar" />
  </v-container>
</template>
<style scoped>
.black {
  color: black !important;
}
.fixM {
  margin-top: -32.5px !important;
}
</style>
<script>
import snackBar from "./snackBar.vue";
export default {
  name: "AdminPage",
  components: {
    snackBar,
  },
  data: () => ({
    // FORM DATA
    atBat: null,
    inoutZone: "",
    didSwing: null,
    Pitcher: null,
    Batter: null,
    Pitch: null,
    Zone: null,

    // SNACKBAR OBJECT
    snackbar: {
      visible: false,
      text: "",
      color: "",
      timeout: null,
      icon: "",
    },

    gameOpposing: "",
    gameDate: new Date(),
    gameTime: new Date().toLocaleTimeString(),
    game: [],
    checkbox: false,
    checkbox2: false,
    ball: false,
    strike: false,
    miss: false,
    foul: false,
    bip: false,
    Pitchers: [],
    Batters: [],
    Pitches: ["Fastball", "Slider", "Curveball", "Changeup", "Cutter", "Other"],
    Zones: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
  }),
  methods: {
    triggerSnackbar(data) {
      this.snackbar.visible = data.visible;
      this.snackbar.text = data.text;
      this.snackbar.color = data.color;
      this.snackbar.icon = data.icon;
      this.snackbar.timeout = data.timeout;
      setTimeout(() => {
        this.snackbar.visible = false;
      }, this.snackbar.timeout);
    },

    check_one(check) {
      if (check == this.checkbox) {
        this.checkbox2 = false;
        this.inoutZone = "inZone";
      } else {
        this.checkbox = false;
        this.inoutZone = "outZone";
      }
    },
    swing(swingResult) {
      if (swingResult == this.ball) {
        this.strike = false;
        this.miss = false;
        this.foul = false;
        this.bip = false;
        this.didSwing = false;
      } else if (swingResult == this.strike) {
        this.ball = false;
        this.miss = false;
        this.foul = false;
        this.bip = false;
        this.didSwing = false;
      } else if (swingResult == this.miss) {
        this.strike = false;
        this.ball = false;
        this.foul = false;
        this.bip = false;
        this.didSwing = true;
      } else if (swingResult == this.foul) {
        this.strike = false;
        this.miss = false;
        this.ball = false;
        this.bip = false;
        this.didSwing = true;
      } else {
        this.strike = false;
        this.miss = false;
        this.foul = false;
        this.ball = false;
        this.didSwing = true;
      }
    },
    async submitPitch(Pitcher, Batter, Pitch, Zone, inoutZone, didSwing) {
      // do error checking
      // if any equal null, then show error message
      if (
        Pitcher == null ||
        Batter == null ||
        Pitch == null ||
        Zone == null ||
        inoutZone == null ||
        didSwing == null
      ) {
        this.triggerSnackbar({
          visible: true,
          text: "There are errors in your form. Please check your inputs and try again.",
          color: "error",
          timeout: 3000,
          icon: "mdi-alert-circle",
        });
      } else {
        await fetch("/api/pitches", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          postData: { Pitcher, Batter, Pitch, Zone, inoutZone, didSwing },
          body: JSON.stringify({
            Pitcher,
            Batter,
            Pitch,
            Zone,
            inoutZone,
            didSwing,
          }),
        });

        this.triggerSnackbar({
          visible: true,
          text: "Your data has been successfully recorded.",
          color: "success",
          timeout: 4000,
          icon: "mdi-check-circle",
        });

        this.Pitcher = null;
        this.Batter = null;
        this.Pitch = null;
        this.Zone = null;
        this.inoutZone = null;
        this.checkbox = false;
        this.checkbox2 = false;
        this.ball = false;
        this.strike = false;
        this.miss = false;
        this.foul = false;
        this.bip = false;
        this.didSwing = null;
      }
      // if not, then submit pitch
      //
    },
    async submitBat(Pitcher, Batter, atBat) {
      if (Pitcher == null || Batter == null || atBat == null) {
        this.triggerSnackbar({
          visible: true,
          text: "There are errors in your form. Please check your inputs and try again.",
          color: "error",
          timeout: 3000,
          icon: "mdi-alert-circle",
        });
      } else {
        await fetch("/api/atBat", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          postData: { Pitcher, Batter, atBat },
          body: JSON.stringify({ Pitcher, Batter, atBat }),
        });

        this.triggerSnackbar({
          visible: true,
          text: "Your data has been successfully recorded.",
          color: "success",
          timeout: 4000,
          icon: "mdi-check-circle",
        });

        this.Batter = null;
        this.Pitcher = null;
        this.atBat = null;
      }
    },
  },
  async created() {
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
