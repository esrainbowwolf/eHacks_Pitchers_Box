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
            ></v-text-field>
          </v-responsive>
        </v-col>

        <v-col cols="d-flex align-right justify-right">
          <v-responsive class="mx-auto" max-width="200">
            <v-text-field
              label="Date"
              variant="solo"
              placeholder="xx/xx/xxxx"
            ></v-text-field>
          </v-responsive>
        </v-col>
        <v-col cols="d-flex align-right justify-right">
          <v-responsive class="mx-auto" max-width="200">
            <v-text-field
              label="Time"
              variant="solo"
              placeholder="00:00"
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
                v-model="Pitcher"
                :items="Pitchers"
                label="Pitcher"
              ></v-select>

              <v-menu :Pitcher="Pitcher">
                <v-list>
                  <v-list-item v-for="(item, index) in items" :key="index">
                    <v-list-item-title>{{ item.title }}</v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
            </div>
          </v-responsive>
        </v-col>

        <v-col cols="d-flex align-left justify-left">
          <v-responsive class="mx-auto" max-width="500">
            <div class="text-center">
              <v-select
                v-model="Batter"
                :items="Batters"
                label="Batter"
              ></v-select>
              <v-menu :Batter="Batter">
                <v-list>
                  <v-list-item v-for="(item, index) in items" :key="index">
                    <v-list-item-title>{{ item.title }}</v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
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
                v-model="Batter"
                :items="Batters"
                label="Batter"
              ></v-select>
              <v-menu :Batter="Batter">
                <v-list>
                  <v-list-item v-for="(item, index) in items" :key="index">
                    <v-list-item-title>{{ item.title }}</v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
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
        <v-col cols="d-flex align-left justify-left"> </v-col>
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
    </v-responsive>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    checkbox: true,
    checkbox2: false,
    ball: true,
    strike: false,
    miss: false,
    foul: false,
    bip: false,
    Pitchers: [],
    Pitcher: "",
    Batters: [],
    Batter: "",
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
  },
};
</script>
