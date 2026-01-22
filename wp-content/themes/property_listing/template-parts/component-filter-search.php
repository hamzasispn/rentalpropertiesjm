<!-- Advanced Property Search Filter with Mapbox Autocomplete -->
<div class="absolute bottom-[-6%] left-1/2 transform -translate-x-1/2 w-[95%] max-w-6xl"
     x-data="propertyFilterComponent()"
     @click.away="expanded = false">

    <!-- Main Filter Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- Collapsed View - Top Row -->
        <div class="flex items-center p-6 gap-4" :class="expanded ? 'border-b border-gray-200' : ''">
            <!-- Location Search with Mapbox Autocomplete -->
            <div class="flex-1 border-r border-gray-200 pr-4">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Location</label>
                <input
                        type="text"
                        id="hero-location-input"
                        placeholder="Search address, city, area..."
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg text-slate-900"
                />

                <input type="hidden" x-model="filters.location">
                <input type="hidden" x-model="filters.coords">
                <input type="hidden" x-model="filters.city">
                <input type="hidden" x-model="filters.locality">
            </div>

            <!-- Property Status - Only rent/for_sale -->
            <div class="flex-1 border-r border-gray-200 pr-4">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Property Status</label>
                <select x-model="filters.status"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-slate-900">
                    <option value="">Any</option>
                    <option value="rent">For Rent</option>
                    <option value="for_sale">For Sale</option>
                </select>
            </div>

            <!-- Property Type -->
            <div class="flex-1 border-r border-gray-200 pr-4">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Property Type</label>
                <select x-model="filters.type"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-slate-900">
                    <option value="">All Types</option>
                    <template x-for="type in types" :key="type.slug">
                        <option :value="type.slug" x-text="type.name"></option>
                    </template>
                </select>
            </div>

            <!-- Search Button with Plus Icon -->
            <div class="flex gap-2">
                <button type="button"
                        @click="expanded = !expanded"
                        class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg transition-colors flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              :d="expanded ? 'M20 12H4' : 'M12 4v16m8-8H4'"/>
                    </svg>
                </button>
                <button type="button" @click="searchProperties()"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg transition-colors font-semibold">
                    Search
                </button>
            </div>
        </div>

        <!-- Expanded Advanced Filters -->
        <div x-show="expanded" x-collapse class="border-t border-gray-200 px-6 py-6 bg-gray-50 space-y-6">

            <!-- Row 1: Beds, Baths, Price Range -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Min Beds -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Min Beds</label>
                    <select x-model="filters.min_beds"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-slate-900">
                        <option value="">Any</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                        <option value="5">5+</option>
                    </select>
                </div>

                <!-- Min Baths -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Min Baths</label>
                    <select x-model="filters.min_baths"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-slate-900">
                        <option value="">Any</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                    </select>
                </div>

                <!-- Price Range with noUiSlider styling -->
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Price Range</label>
                    <div class="flex gap-2 items-center">
                        <div class="flex-1">
                            <input type="number" x-model="filters.min_price" placeholder="Min"
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg text-slate-900 text-sm">
                        </div>
                        <span class="text-slate-500">-</span>
                        <div class="flex-1">
                            <input type="number" x-model="filters.max_price" placeholder="Max"
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg text-slate-900 text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 2: Area Range, City, Locality -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Area Range -->
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Area (sq ft)</label>
                    <div class="flex gap-2 items-center">
                        <div class="flex-1">
                            <input type="number" x-model="filters.min_area" placeholder="Min"
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg text-slate-900 text-sm">
                        </div>
                        <span class="text-slate-500">-</span>
                        <div class="flex-1">
                            <input type="number" x-model="filters.max_area" placeholder="Max"
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg text-slate-900 text-sm">
                        </div>
                    </div>
                </div>

                <!-- City -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">City</label>
                    <input type="text" x-model="filters.city" placeholder="Enter city..."
                           class="w-full px-4 py-2 border border-slate-300 rounded-lg text-slate-900">
                </div>

                <!-- Locality -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Locality/Block</label>
                    <input type="text" x-model="filters.locality" placeholder="Enter locality..."
                           class="w-full px-4 py-2 border border-slate-300 rounded-lg text-slate-900">
                </div>
            </div>

            <!-- Row 3: Keyword, Property ID -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Keyword -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Keyword</label>
                    <input type="text" x-model="filters.keyword" placeholder="Search description..."
                           class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-900">
                </div>

                <!-- Property ID -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Property ID</label>
                    <input type="text" x-model="filters.property_id" placeholder="Enter Property ID..."
                           class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-900">
                </div>
            </div>

            <!-- Amenities Checkboxes -->
            <div class="pt-4 border-t border-gray-300">
                <label class="block text-sm font-semibold text-slate-700 mb-4">Amenities</label>
                <div x-show="loadingAmenities" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <template x-for="i in 12" :key="i">
                        <div class="h-6 bg-gray-300 rounded animate-pulse"></div>
                    </template>
                </div>
                <div x-show="!loadingAmenities && amenities.length > 0"
                     class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <template x-for="amenity in amenities" :key="amenity.key">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" x-model="filters.amenities" :value="amenity.key"
                                   class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500 accent-blue-600">
                            <span class="text-sm text-slate-700 truncate" :title="`${amenity.label} (${amenity.count})`"
                                  x-text="`${amenity.label} (${amenity.count})`"></span>
                        </label>
                    </template>
                </div>
                <div x-show="!loadingAmenities && amenities.length === 0" class="text-center text-slate-500 py-4">
                    No amenities available
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 pt-4 border-t border-gray-300">
                <button type="button" @click="resetFilters()"
                        class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset
                </button>
                <button type="button" @click="searchProperties()" :disabled="loading"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white font-semibold px-8 py-3 rounded-lg transition-colors flex items-center justify-center gap-2">
                    <span x-show="!loading" class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search
                    </span>
                    <span x-show="loading" class="flex items-center gap-2">
                        <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Searching...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function propertyFilterComponent() {
        return {
            expanded: false,
            filters: {
                location: '',
                coords: '',
                status: '',
                type: '',
                min_beds: '',
                min_baths: '',
                min_price: '',
                max_price: '',
                min_area: '',
                max_area: '',
                city: '',
                locality: '',
                keyword: '',
                property_id: '',
                amenities: []
            },
            types: [],
            amenities: [],
            loading: false,
            loadingAmenities: true,
            geocoder: null,

            init() {
                this.loadFilterOptions();
                this.loadAmenities();
                this.initGeocoder();
            },

            initGeocoder() {
                if (!window.MapboxGeocoder || !propertyTheme.mapbox_key) return;

                this.geocoder = new MapboxGeocoder({
                    accessToken: propertyTheme.mapbox_key,
                    types: 'address,place,locality,neighborhood',
                    localGeocoder: forwardGeocoder
                    placeholder: 'Search address, city, area...',
                    limit: 8,
                    marker: false,
                    mapboxgl: null,
                });

                function forwardGeocoder(query) {
                    const matches = [];
                    const regexes = [query.trim()].map(q => new RegExp('\\b' + q, 'i'));

                    fetch(propertyTheme.rest_url + 'property-theme/v1/locations/autocomplete?search=' + encodeURIComponent(query))
                        .then(r => r.json())
                        .then(d => d.locations || [])
                        .then(results => {
                            for (const result of results) {
                                for (const regex of regexes) {
                                    if (regex.test(result)) {
                                        matches.push({ name: result, center: [0, 0], place_name: result, place_type: ['place'], relevance: 1 });
                                    }
                                }
                            }
                        });
                    return matches;
                }

                // Attach to INPUT instead of container
                this.geocoder.addTo('#hero-location-input');

                this.geocoder.on('result', (e) => {
                    const result = e.result;

                    // Full address
                    this.filters.location = result.place_name;

                    // Coordinates
                    this.filters.coords = `${result.center[1]},${result.center[0]}`;

                    // Extract city & locality
                    const context = result.context || [];

                    this.filters.city = context.find(c => c.id.includes('place'))?.text || '';
                    this.filters.locality = context.find(c =>
                        c.id.includes('locality') || c.id.includes('neighborhood')
                    )?.text || '';

                    console.log('[Geocoder]', {
                        location: this.filters.location,
                        coords: this.filters.coords,
                        city: this.filters.city,
                        locality: this.filters.locality
                    });
                });

                this.geocoder.on('clear', () => {
                    this.filters.location = '';
                    this.filters.coords = '';
                    this.filters.city = '';
                    this.filters.locality = '';
                });
            },

            async loadFilterOptions() {
                try {
                    const response = await fetch('<?php echo esc_url(rest_url('property-theme/v1/filter-options')); ?>');
                    const data = await response.json();

                    this.types = data.property_types || [];
                } catch (error) {
                    console.error('[v0] Error loading filter options:', error);
                }
            },

            async loadAmenities() {
                try {
                    const response = await fetch('<?php echo esc_url(rest_url('property-theme/v1/filter-options/amenities')); ?>');
                    const data = await response.json();

                    this.amenities = data.amenities || [];
                    this.loadingAmenities = false;
                } catch (error) {
                    console.error('[v0] Error loading amenities:', error);
                    this.loadingAmenities = false;
                }
            },

            async searchProperties() {
                this.loading = true;

                const params = new URLSearchParams();

                if (this.filters.location) params.append('location', this.filters.location);
                if (this.filters.coords) params.append('coords', this.filters.coords);
                if (this.filters.status) params.append('status', this.filters.status);
                if (this.filters.type) params.append('property_type', this.filters.type);
                if (this.filters.keyword) params.append('search', this.filters.keyword);
                if (this.filters.min_beds) params.append('beds_min', this.filters.min_beds);
                if (this.filters.min_baths) params.append('baths_min', this.filters.min_baths);
                if (this.filters.min_price && this.filters.min_price !== '') params.append('price_min', this.filters.min_price);
                if (this.filters.max_price && this.filters.max_price !== '') params.append('price_max', this.filters.max_price);
                if (this.filters.min_area && this.filters.min_area !== '') params.append('area_min', this.filters.min_area);
                if (this.filters.max_area && this.filters.max_area !== '') params.append('area_max', this.filters.max_area);
                if (this.filters.city) params.append('city', this.filters.city);
                if (this.filters.locality) params.append('locality', this.filters.locality);
                if (this.filters.property_id) params.append('property_id', this.filters.property_id);
                if (this.filters.amenities.length > 0) params.append('amenities', this.filters.amenities.join(','));

                const searchUrl = '<?php echo home_url('/properties/'); ?>' + '?' + params.toString();
                console.log('[v0] Redirecting to archive with params:', searchUrl);
                window.location.href = searchUrl;
            },

            resetFilters() {
                this.filters = {
                    location: '',
                    coords: '',
                    status: '',
                    type: '',
                    min_beds: '',
                    min_baths: '',
                    min_price: '',
                    max_price: '',
                    min_area: '',
                    max_area: '',
                    city: '',
                    locality: '',
                    keyword: '',
                    property_id: '',
                    amenities: []
                };
                if (this.geocoder) {
                    this.geocoder.clear();
                }
            }
        };
    }
</script>

