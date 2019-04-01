Vue.component('item-preview', {
  template: "#item-preview-template",
  props: [
    'icon',
    'title',
    'subtitle',
    'date',
    'qtySummary',
    'image',
    'note',
    'time'
  ],
  data: function() {
    return {
      
    }
  },
})

Vue.component('item-form', {
  template: '#item-form-template',
  props: ['recent'],
  data: function() {
    return {
      $tabs: null,
      activeTab: 'itinerary'
    }
  },
  mounted: function() {
    this.$tabs = $(this.$refs.tabs).find('.item');
    this.$tabs.tab();
    this.$tabs.tab('change tab', 'itinerary');
    this.initExtras();
  },
  methods: {
    initExtras: function() {
      var $pricingList = $(this.$refs.pricing).find('.room-list').first();
      
      var template = `
        <div class="input-delete">
          <input type="text">
          <a href="#"><i class="icon trash"></i></a>
        </div>
      `
      
      $(this.$refs.extrasAdd).on('click',function(){
        var $newItem = $pricingList.find('.item').first().clone();
        $newInput = $()
        $newItem.find('.column').first()
          .removeClass('transparent').addClass('opaque')
          .html(template)
        $pricingList.append($newItem);
        $newItem.find('.input-delete a').on('click', function() {
          $newItem.remove();
        })
      })
    }
  }
})

new Vue({
  el: "#app",
  
  data: function() {
    return {
      $tabs: null,
      tabs: [
        {
          key: "flight",
          title: "Flight"
        },
        {
          key: "hotel",
          title: "Hotel"
        },
        {
          key: "car",
          title: "Car Hire"
        },
        {
          key: "transfer",
          title: "Transfer"
        },
        {
          key: "other",
          title: "Other"
        }
      ],
      items: {
        wireframe1: {
          type: 'Wireframe',
          title: 'Title',
          subtitle: 'Subtitle',
          qtySummary: 'Quantity summary',
          note: 'Note / Description',
          image: 'http://via.placeholder.com/150x150'
        },
        wireframe2: {
          type: 'Wireframe - No image',
          title: 'Title',
          subtitle: 'Subtitle',
          qtySummary: 'Quantity summary',
          note: 'Note / Description',
        },
        flight1: {
          type: 'Flight - A to B',
          icon: 'plane',
          title: 'Dublin to London Heathrow',
          subtitle: 'Ryanair flight FR123 from DUB to LHR. Economy.',
          qtySummary: '2 Adults, 2 Young Adults',
          note: 'Tickets to the departure loung have been included. This flight is ATOL protected.',
          time: '00:00'
        },
        flight2: {
          type: 'Flight - A to B to C',
          icon: 'plane',
          title: 'DUB - LHR - JFK',
          subtitle: 'Aer Lingus from Dublin (DUB) to London Heathrow (LHR). Continuing on from London Heathrow to John F Kennedy (JFK).',
          qtySummary: '2 Adults, 2 Young Adults',
          note: 'Tickets to the departure loung have been included. This flight is ATOL protected.',
          time: '00:00'
        },
        hotel: {
          type: 'Hotel',
          icon: 'hotel',
          title: 'Hilton Garden Inn Veracruz Boca del Rio',
          subtitle: 'Blvd. Manuel Avila Camacho Lote 5 y 6 Costa de Oro, , Veracruz, Veracruz, 94299, Mexico',
          qtySummary: '7 nights stay for 2 Adults, 2 Young Adults',
          note: 'A contemporary hotel, just minutes from gourmet restaurants, lively bars and vibrant nightlife, Hilton Garden Inn Boca del Rio Veracruz features direct access to the inviting soft sands of Boca del Rio Beach. Guests can enjoy easy access to the World Trade Center, just five minutes away, and the airport - only a 25 minute drive from our stylish hotel in Boca del Rio. Visit nearby attractions including the Port of Veracruz, the Aquarium of Veracruz and Isla de Sacrificios.Sip a chilled drink from your refrigerator as you admire beautiful sea views from a spacious guest room or suite at this Boca del Rio hotel. Enjoy amenities including complimentary WiFi, an ergonomic desk, an HDTV, a microwave and an MP3 alarm clock radio.Print documents and surf the web in the complimentary 24-hour business center and hold a business or social event for up to 400 people at this Veracruz hotel with 3160 sq. ft. flexible meeting space. Whether it\'s for a conference, training seminar or wedding reception, our dedicated team will be happy to help ensure the success of your event.',
          image: 'http://bookabed.ivector.co.uk/Content/DataObjects/ThirdPartyProperty/img/1/001/025/824/396/image_005437a_hb_ba_006.jpg'
        },
        car: {
          type: 'Car',
          icon: 'car',
          title: 'Ford Fiesta Pickup',
          subtitle: 'Ford Fiesta or similar pickup from John F. Kennedy airport',
          note: 'Only drivers with a valid license will be able to drive this car.',
          time: '14:25'
        },
        transfer: {
          type: 'Transfer',
          icon: 'train',
          title: 'Limo Transfer',
          subtitle: 'John F. Kennedy Airport to Fitzpatrick Hotel, Manhattan',
          note: 'The driver will be waiting at the airport with a big sign. Can\'t miss him. Paul, lovely fella.',
          time: '18:25'
        },
        other: {
          type: 'Other',
          icon: 'ticket',
          title: 'Grand Canyon Helicopter Ride',
          subtitle: 'Trip over the grand canyon in a helicopter',
          note: 'Must be over 13 years of age',
          time: '12:25'
        },
      }
    }
  },
  
  mounted: function() {
    this.$tabs = $(this.$refs.tabs).find('.item');
    this.$tabs.tab();
    this.$tabs.tab('change tab', 'transfer');
    this.flightTab();
  },
  
  methods: {
    flightTab: function() {
      $('.toggle-flight-form').on('click', function(){
        $('#flight-itinerary-type-select, #manual-flight-form').toggleClass('hide')
      })
    }
  }
})