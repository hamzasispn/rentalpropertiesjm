<?php
/**
 * Main template file for the property listing theme
 * Template Name: Home Page
 */
get_header();
?>

<div class="min-h-screen bg-slate-50 mt-20">

    <!-- Properties Grid -->
    <div class="max-w-[1520px] mx-auto px-4 py-16">
        <div x-data="propertyList()" x-init="loadProperties()">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" x-show="!loading">
                <template x-for="property in properties" :key="property.id">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow overflow-hidden">
                        <div class="relative h-48 bg-slate-200">
                            <img :src="property.image || '/placeholder.svg?height=300&width=400'" :alt="property.title"
                                class="w-full h-full object-cover">
                            <div x-show="property.featured"
                                class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Featured</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">
                                <a :href="property.permalink" class="hover:text-blue-600 transition-colors"
                                    x-text="property.title"></a>
                            </h3>
                            <p class="text-slate-600 text-sm mb-4" x-text="property.address"></p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-2xl font-bold text-blue-600"
                                    x-text="'$' + property.price.toLocaleString()"></span>
                            </div>
                            <div class="flex gap-4 text-sm text-slate-600 mb-6">
                                <span><strong x-text="property.bedrooms"></strong> Beds</span>
                                <span><strong x-text="property.bathrooms"></strong> Baths</span>
                                <span><strong x-text="property.area"></strong> sqft</span>
                            </div>
                            <a :href="property.permalink"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-center">View
                                Details</a>
                        </div>
                    </div>
                </template>
            </div>

            <div x-show="loading" class="flex justify-center items-center py-12">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
            </div>


        </div>
    </div>

    <div class="my-6 flex flex-col gap-4 max-w-[1520px] w-full mx-auto">
        <h5 class="text-3xl font-bold text-black/90 text-center">Sell or Rent Your Property in 3 Easy Steps</h5>
        <div class="flex justify-between gap-8 mt-12 w-full">
            <div class=" bg-white p-6 rounded-lg shadow-2xl w-1/3">
                <div class="flex flex-col gap-3 justify-start">
                    <h6 class="text-xl font-semibold text-black/90">Step 1 — Create an Account</h6>
                    <p class="text-black/80 font-light text-md">Sign up using your email or phone number and access your
                        personal dashboard.</p>
                </div>
            </div>
            <div class=" bg-white p-6 rounded-lg shadow-2xl w-1/3">
                <div class="flex flex-col gap-3 justify-start">
                    <h6 class="text-xl font-semibold text-black/90">Step 1 — Create an Account</h6>
                    <p class="text-black/80 font-light text-md">Sign up using your email or phone number and access your
                        personal dashboard.</p>
                </div>
            </div>
            <div class=" bg-white p-6 rounded-lg shadow-2xl w-1/3">
                <div class="flex flex-col gap-3 justify-start">
                    <h6 class="text-xl font-semibold text-black/90">Step 1 — Create an Account</h6>
                    <p class="text-black/80 font-light text-md">Sign up using your email or phone number and access your
                        personal dashboard.</p>
                </div>
            </div>
        </div>
        <a class="w-fit btn-primary mx-auto">
            List Your Property Today
        </a>

    </div>

    <div class="my-20 flex  md:flex-row items-center flex-col gap-4 max-w-[1520px] w-full mx-auto">
        <div class="flex flex-col gap-4 lg:w-1/2 w-full">
            <h5 class="text-4xl font-bold text-black/90">Why Property Owners and Buyers Trust Us?</h5>
            <ul class="flex flex-col gap-4 mt-5">
                <li class="flex items-center gap-2 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C9.61305 3 7.32387 3.94821 5.63604 5.63604C3.94821 7.32387 3 9.61305 3 12C3 14.3869 3.94821 16.6761 5.63604 18.364C7.32387 20.0518 9.61305 21 12 21ZM11.768 15.64L16.768 9.64L15.232 8.36L10.932 13.519L8.707 11.293L7.293 12.707L10.293 15.707L11.067 16.481L11.768 15.64Z"
                            fill="#132364" />
                    </svg>
                    <span>Verified Listings — every property checked for accuracy</span>
                </li>
                <li class="flex items-center gap-2 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C9.61305 3 7.32387 3.94821 5.63604 5.63604C3.94821 7.32387 3 9.61305 3 12C3 14.3869 3.94821 16.6761 5.63604 18.364C7.32387 20.0518 9.61305 21 12 21ZM11.768 15.64L16.768 9.64L15.232 8.36L10.932 13.519L8.707 11.293L7.293 12.707L10.293 15.707L11.067 16.481L11.768 15.64Z"
                            fill="#132364" />
                    </svg>
                    <span>No Spam, No Free Ads — only genuine listings from real owners</span>
                </li>
                <li class="flex items-center gap-2 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C9.61305 3 7.32387 3.94821 5.63604 5.63604C3.94821 7.32387 3 9.61305 3 12C3 14.3869 3.94821 16.6761 5.63604 18.364C7.32387 20.0518 9.61305 21 12 21ZM11.768 15.64L16.768 9.64L15.232 8.36L10.932 13.519L8.707 11.293L7.293 12.707L10.293 15.707L11.067 16.481L11.768 15.64Z"
                            fill="#132364" />
                    </svg>
                    <span>Transparent Pricing — choose exactly what you pay for</span>
                </li>
                <li class="flex items-center gap-2 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C9.61305 3 7.32387 3.94821 5.63604 5.63604C3.94821 7.32387 3 9.61305 3 12C3 14.3869 3.94821 16.6761 5.63604 18.364C7.32387 20.0518 9.61305 21 12 21ZM11.768 15.64L16.768 9.64L15.232 8.36L10.932 13.519L8.707 11.293L7.293 12.707L10.293 15.707L11.067 16.481L11.768 15.64Z"
                            fill="#132364" />
                    </svg>
                    <span>Boost Options — make your property stand out</span>
                </li>
                <li class="flex items-center gap-2 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C9.61305 3 7.32387 3.94821 5.63604 5.63604C3.94821 7.32387 3 9.61305 3 12C3 14.3869 3.94821 16.6761 5.63604 18.364C7.32387 20.0518 9.61305 21 12 21ZM11.768 15.64L16.768 9.64L15.232 8.36L10.932 13.519L8.707 11.293L7.293 12.707L10.293 15.707L11.067 16.481L11.768 15.64Z"
                            fill="#132364" />
                    </svg>
                    <span>Easy Dashboard — manage, renew, or upgrade listings anytime</span>
                </li>
            </ul>
        </div>
        <div class="lg:w-1/2 w-full">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/section-3.png" alt="Why Choose Us Illustration"
                class="rounded-2xl" />
        </div>
    </div>

    <div class="my-6 flex flex-col gap-8 max-w-[1520px] mx-auto w-full mx-auto">
        <div class="flex flex-col gap-3 max-w-[706px] mx-auto text-center">
            <h5 class="text-3xl font-bold text-black/90 text-center">Choose the Right Plan for Your Property</h5>
            <p class="text-center w-[90%] text-[#1A1A1A] text-md mx-auto">List your property with confidence. All our
                plans come with verified listing approval, dashboard access, and the ability to boost your ad anytime.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 space-x-4 md:space-y-0 space-y-4">

            <?php get_template_part('template-parts/component', 'plan-card'); ?>
        </div>

    </div>
    <div class="my-20 flex flex-col gap-8 max-w-[1520px] mx-auto w-full">
        <div class="flex flex-col gap-3 max-w-[706px] mx-auto text-center">
            <h5 class="text-3xl font-bold text-black/90 text-center">Find the Right Property for You</h5>
            <p class="text-center w-[90%] text-[#1A1A1A] text-md mx-auto">Whether you’re buying, selling, or renting,
                explore a wide range of property types across the U.S.  From cozy apartments to luxury estates and
                commercial investments — we make it easy to list or discover properties that match your goals.</p>
        </div>
        <div class="flex lg:flex-row flex-col gap-10 ">
            <div class="w-full lg:w-[45%]">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/home.png" alt="home">
            </div>
            <div class="w-full lg:w-[55%] grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-lg shadow-lg px-4 py-3 flex gap-4 items-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" fill="none">
                            <path
                                d="M2.504 0C1.124 0 0.00400019 1.12 0.00400019 2.5L0 19.5C0 20.88 1.12 22 2.5 22H6V18.87C6.00003 18.1822 6.14196 17.5018 6.41692 16.8714C6.69188 16.2409 7.09395 15.674 7.598 15.206L8.902 13.996C8.7104 13.9771 8.52834 13.9032 8.37768 13.7834C8.22702 13.6635 8.11417 13.5027 8.05268 13.3202C7.99119 13.1378 7.98368 12.9414 8.03104 12.7548C8.07841 12.5682 8.17864 12.3992 8.3197 12.2682C8.46076 12.1372 8.63665 12.0496 8.82625 12.0161C9.01584 11.9826 9.21108 12.0045 9.38851 12.0793C9.56594 12.154 9.71803 12.2784 9.8265 12.4375C9.93497 12.5965 9.99522 12.7835 10 12.976L13.28 9.932C13.9063 9.35076 14.7022 8.98534 15.5512 8.88924C16.4002 8.79315 17.2577 8.97144 17.998 9.398C17.9717 8.75314 17.697 8.14345 17.2314 7.6965C16.7658 7.24955 16.1454 6.99998 15.5 7H14.506C14.3734 7 14.2462 6.94732 14.1524 6.85355C14.0587 6.75979 14.006 6.63261 14.006 6.5L14.01 2.502C14.01 1.122 12.89 0 11.51 0H2.504ZM5 6C4.73478 6 4.48043 5.89464 4.29289 5.70711C4.10536 5.51957 4 5.26522 4 5C4 4.73478 4.10536 4.48043 4.29289 4.29289C4.48043 4.10536 4.73478 4 5 4C5.26522 4 5.51957 4.10536 5.70711 4.29289C5.89464 4.48043 6 4.73478 6 5C6 5.26522 5.89464 5.51957 5.70711 5.70711C5.51957 5.89464 5.26522 6 5 6ZM6 9C6 9.26522 5.89464 9.51957 5.70711 9.70711C5.51957 9.89464 5.26522 10 5 10C4.73478 10 4.48043 9.89464 4.29289 9.70711C4.10536 9.51957 4 9.26522 4 9C4 8.73478 4.10536 8.48043 4.29289 8.29289C4.48043 8.10536 4.73478 8 5 8C5.26522 8 5.51957 8.10536 5.70711 8.29289C5.89464 8.48043 6 8.73478 6 9ZM5 14C4.73478 14 4.48043 13.8946 4.29289 13.7071C4.10536 13.5196 4 13.2652 4 13C4 12.7348 4.10536 12.4804 4.29289 12.2929C4.48043 12.1054 4.73478 12 5 12C5.26522 12 5.51957 12.1054 5.70711 12.2929C5.89464 12.4804 6 12.7348 6 13C6 13.2652 5.89464 13.5196 5.70711 13.7071C5.51957 13.8946 5.26522 14 5 14ZM10 5C10 5.26522 9.89464 5.51957 9.70711 5.70711C9.51957 5.89464 9.26522 6 9 6C8.73478 6 8.48043 5.89464 8.29289 5.70711C8.10536 5.51957 8 5.26522 8 5C8 4.73478 8.10536 4.48043 8.29289 4.29289C8.48043 4.10536 8.73478 4 9 4C9.26522 4 9.51957 4.10536 9.70711 4.29289C9.89464 4.48043 10 4.73478 10 5ZM9 10C8.73478 10 8.48043 9.89464 8.29289 9.70711C8.10536 9.51957 8 9.26522 8 9C8 8.73478 8.10536 8.48043 8.29289 8.29289C8.48043 8.10536 8.73478 8 9 8C9.26522 8 9.51957 8.10536 9.70711 8.29289C9.89464 8.48043 10 8.73478 10 9C10 9.26522 9.89464 9.51957 9.70711 9.70711C9.51957 9.89464 9.26522 10 9 10ZM17.36 11.4C16.9902 11.057 16.5044 10.8664 16 10.8664C15.4956 10.8664 15.0098 11.057 14.64 11.4L8.96 16.674C8.65716 16.9549 8.41557 17.2952 8.25038 17.6738C8.08519 18.0524 7.99995 18.461 8 18.874V26C8 26.5304 8.21071 27.0391 8.58579 27.4142C8.96086 27.7893 9.46957 28 10 28H13C13.5304 28 14.0391 27.7893 14.4142 27.4142C14.7893 27.0391 15 26.5304 15 26V24H17V26C17 26.5304 17.2107 27.0391 17.5858 27.4142C17.9609 27.7893 18.4696 28 19 28H22C22.5304 28 23.0391 27.7893 23.4142 27.4142C23.7893 27.0391 24 26.5304 24 26V18.872C24 18.459 23.9148 18.0504 23.7496 17.6718C23.5844 17.2932 23.3428 16.9529 23.04 16.672L17.36 11.4ZM10.32 18.14L16 12.864L21.68 18.14C21.7808 18.2335 21.8612 18.3467 21.9163 18.4727C21.9713 18.5986 21.9998 18.7345 22 18.872V26H19V24C19 23.4696 18.7893 22.9609 18.4142 22.5858C18.0391 22.2107 17.5304 22 17 22H15C14.4696 22 13.9609 22.2107 13.5858 22.5858C13.2107 22.9609 13 23.4696 13 24V26H10V18.872C10.0002 18.7345 10.0287 18.5986 10.0837 18.4727C10.1388 18.3467 10.2192 18.2335 10.32 18.14Z"
                                fill="#132364" />
                        </svg>

                        <h6 class="text-lg font-semibold text-[#1A1A1A]">Residential Properties</h6>

                    </div>
                    <p class="text-[#1A1A1A] text-md mx-auto">Perfect for families, individuals, or investors seeking
                        comfortable living spaces.</p>
                    <ul class="list-disc flex flex-col gap-2 text-black mt-2 pl-6">
                        <li>Single-Family Homes</li>
                        <li>Townhouses & Duplexes</li>
                        <li>Condos & Apartments</li>
                        <li>Vacation Rentals & Cabins</li>
                        <li>Multi-Family Homes</li>
                    </ul>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-lg shadow-lg px-4 py-3 flex gap-4 items-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" fill="none">
                            <path
                                d="M2.504 0C1.124 0 0.00400019 1.12 0.00400019 2.5L0 19.5C0 20.88 1.12 22 2.5 22H6V18.87C6.00003 18.1822 6.14196 17.5018 6.41692 16.8714C6.69188 16.2409 7.09395 15.674 7.598 15.206L8.902 13.996C8.7104 13.9771 8.52834 13.9032 8.37768 13.7834C8.22702 13.6635 8.11417 13.5027 8.05268 13.3202C7.99119 13.1378 7.98368 12.9414 8.03104 12.7548C8.07841 12.5682 8.17864 12.3992 8.3197 12.2682C8.46076 12.1372 8.63665 12.0496 8.82625 12.0161C9.01584 11.9826 9.21108 12.0045 9.38851 12.0793C9.56594 12.154 9.71803 12.2784 9.8265 12.4375C9.93497 12.5965 9.99522 12.7835 10 12.976L13.28 9.932C13.9063 9.35076 14.7022 8.98534 15.5512 8.88924C16.4002 8.79315 17.2577 8.97144 17.998 9.398C17.9717 8.75314 17.697 8.14345 17.2314 7.6965C16.7658 7.24955 16.1454 6.99998 15.5 7H14.506C14.3734 7 14.2462 6.94732 14.1524 6.85355C14.0587 6.75979 14.006 6.63261 14.006 6.5L14.01 2.502C14.01 1.122 12.89 0 11.51 0H2.504ZM5 6C4.73478 6 4.48043 5.89464 4.29289 5.70711C4.10536 5.51957 4 5.26522 4 5C4 4.73478 4.10536 4.48043 4.29289 4.29289C4.48043 4.10536 4.73478 4 5 4C5.26522 4 5.51957 4.10536 5.70711 4.29289C5.89464 4.48043 6 4.73478 6 5C6 5.26522 5.89464 5.51957 5.70711 5.70711C5.51957 5.89464 5.26522 6 5 6ZM6 9C6 9.26522 5.89464 9.51957 5.70711 9.70711C5.51957 9.89464 5.26522 10 5 10C4.73478 10 4.48043 9.89464 4.29289 9.70711C4.10536 9.51957 4 9.26522 4 9C4 8.73478 4.10536 8.48043 4.29289 8.29289C4.48043 8.10536 4.73478 8 5 8C5.26522 8 5.51957 8.10536 5.70711 8.29289C5.89464 8.48043 6 8.73478 6 9ZM5 14C4.73478 14 4.48043 13.8946 4.29289 13.7071C4.10536 13.5196 4 13.2652 4 13C4 12.7348 4.10536 12.4804 4.29289 12.2929C4.48043 12.1054 4.73478 12 5 12C5.26522 12 5.51957 12.1054 5.70711 12.2929C5.89464 12.4804 6 12.7348 6 13C6 13.2652 5.89464 13.5196 5.70711 13.7071C5.51957 13.8946 5.26522 14 5 14ZM10 5C10 5.26522 9.89464 5.51957 9.70711 5.70711C9.51957 5.89464 9.26522 6 9 6C8.73478 6 8.48043 5.89464 8.29289 5.70711C8.10536 5.51957 8 5.26522 8 5C8 4.73478 8.10536 4.48043 8.29289 4.29289C8.48043 4.10536 8.73478 4 9 4C9.26522 4 9.51957 4.10536 9.70711 4.29289C9.89464 4.48043 10 4.73478 10 5ZM9 10C8.73478 10 8.48043 9.89464 8.29289 9.70711C8.10536 9.51957 8 9.26522 8 9C8 8.73478 8.10536 8.48043 8.29289 8.29289C8.48043 8.10536 8.73478 8 9 8C9.26522 8 9.51957 8.10536 9.70711 8.29289C9.89464 8.48043 10 8.73478 10 9C10 9.26522 9.89464 9.51957 9.70711 9.70711C9.51957 9.89464 9.26522 10 9 10ZM17.36 11.4C16.9902 11.057 16.5044 10.8664 16 10.8664C15.4956 10.8664 15.0098 11.057 14.64 11.4L8.96 16.674C8.65716 16.9549 8.41557 17.2952 8.25038 17.6738C8.08519 18.0524 7.99995 18.461 8 18.874V26C8 26.5304 8.21071 27.0391 8.58579 27.4142C8.96086 27.7893 9.46957 28 10 28H13C13.5304 28 14.0391 27.7893 14.4142 27.4142C14.7893 27.0391 15 26.5304 15 26V24H17V26C17 26.5304 17.2107 27.0391 17.5858 27.4142C17.9609 27.7893 18.4696 28 19 28H22C22.5304 28 23.0391 27.7893 23.4142 27.4142C23.7893 27.0391 24 26.5304 24 26V18.872C24 18.459 23.9148 18.0504 23.7496 17.6718C23.5844 17.2932 23.3428 16.9529 23.04 16.672L17.36 11.4ZM10.32 18.14L16 12.864L21.68 18.14C21.7808 18.2335 21.8612 18.3467 21.9163 18.4727C21.9713 18.5986 21.9998 18.7345 22 18.872V26H19V24C19 23.4696 18.7893 22.9609 18.4142 22.5858C18.0391 22.2107 17.5304 22 17 22H15C14.4696 22 13.9609 22.2107 13.5858 22.5858C13.2107 22.9609 13 23.4696 13 24V26H10V18.872C10.0002 18.7345 10.0287 18.5986 10.0837 18.4727C10.1388 18.3467 10.2192 18.2335 10.32 18.14Z"
                                fill="#132364" />
                        </svg>

                        <h6 class="text-lg font-semibold text-[#1A1A1A]">Residential Properties</h6>

                    </div>
                    <p class="text-[#1A1A1A] text-md mx-auto">Perfect for families, individuals, or investors seeking
                        comfortable living spaces.</p>
                    <ul class="list-disc flex flex-col gap-2 text-black mt-2 pl-6">
                        <li>Single-Family Homes</li>
                        <li>Townhouses & Duplexes</li>
                        <li>Condos & Apartments</li>
                        <li>Vacation Rentals & Cabins</li>
                        <li>Multi-Family Homes</li>
                    </ul>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-lg shadow-lg px-4 py-3 flex gap-4 items-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" fill="none">
                            <path
                                d="M2.504 0C1.124 0 0.00400019 1.12 0.00400019 2.5L0 19.5C0 20.88 1.12 22 2.5 22H6V18.87C6.00003 18.1822 6.14196 17.5018 6.41692 16.8714C6.69188 16.2409 7.09395 15.674 7.598 15.206L8.902 13.996C8.7104 13.9771 8.52834 13.9032 8.37768 13.7834C8.22702 13.6635 8.11417 13.5027 8.05268 13.3202C7.99119 13.1378 7.98368 12.9414 8.03104 12.7548C8.07841 12.5682 8.17864 12.3992 8.3197 12.2682C8.46076 12.1372 8.63665 12.0496 8.82625 12.0161C9.01584 11.9826 9.21108 12.0045 9.38851 12.0793C9.56594 12.154 9.71803 12.2784 9.8265 12.4375C9.93497 12.5965 9.99522 12.7835 10 12.976L13.28 9.932C13.9063 9.35076 14.7022 8.98534 15.5512 8.88924C16.4002 8.79315 17.2577 8.97144 17.998 9.398C17.9717 8.75314 17.697 8.14345 17.2314 7.6965C16.7658 7.24955 16.1454 6.99998 15.5 7H14.506C14.3734 7 14.2462 6.94732 14.1524 6.85355C14.0587 6.75979 14.006 6.63261 14.006 6.5L14.01 2.502C14.01 1.122 12.89 0 11.51 0H2.504ZM5 6C4.73478 6 4.48043 5.89464 4.29289 5.70711C4.10536 5.51957 4 5.26522 4 5C4 4.73478 4.10536 4.48043 4.29289 4.29289C4.48043 4.10536 4.73478 4 5 4C5.26522 4 5.51957 4.10536 5.70711 4.29289C5.89464 4.48043 6 4.73478 6 5C6 5.26522 5.89464 5.51957 5.70711 5.70711C5.51957 5.89464 5.26522 6 5 6ZM6 9C6 9.26522 5.89464 9.51957 5.70711 9.70711C5.51957 9.89464 5.26522 10 5 10C4.73478 10 4.48043 9.89464 4.29289 9.70711C4.10536 9.51957 4 9.26522 4 9C4 8.73478 4.10536 8.48043 4.29289 8.29289C4.48043 8.10536 4.73478 8 5 8C5.26522 8 5.51957 8.10536 5.70711 8.29289C5.89464 8.48043 6 8.73478 6 9ZM5 14C4.73478 14 4.48043 13.8946 4.29289 13.7071C4.10536 13.5196 4 13.2652 4 13C4 12.7348 4.10536 12.4804 4.29289 12.2929C4.48043 12.1054 4.73478 12 5 12C5.26522 12 5.51957 12.1054 5.70711 12.2929C5.89464 12.4804 6 12.7348 6 13C6 13.2652 5.89464 13.5196 5.70711 13.7071C5.51957 13.8946 5.26522 14 5 14ZM10 5C10 5.26522 9.89464 5.51957 9.70711 5.70711C9.51957 5.89464 9.26522 6 9 6C8.73478 6 8.48043 5.89464 8.29289 5.70711C8.10536 5.51957 8 5.26522 8 5C8 4.73478 8.10536 4.48043 8.29289 4.29289C8.48043 4.10536 8.73478 4 9 4C9.26522 4 9.51957 4.10536 9.70711 4.29289C9.89464 4.48043 10 4.73478 10 5ZM9 10C8.73478 10 8.48043 9.89464 8.29289 9.70711C8.10536 9.51957 8 9.26522 8 9C8 8.73478 8.10536 8.48043 8.29289 8.29289C8.48043 8.10536 8.73478 8 9 8C9.26522 8 9.51957 8.10536 9.70711 8.29289C9.89464 8.48043 10 8.73478 10 9C10 9.26522 9.89464 9.51957 9.70711 9.70711C9.51957 9.89464 9.26522 10 9 10ZM17.36 11.4C16.9902 11.057 16.5044 10.8664 16 10.8664C15.4956 10.8664 15.0098 11.057 14.64 11.4L8.96 16.674C8.65716 16.9549 8.41557 17.2952 8.25038 17.6738C8.08519 18.0524 7.99995 18.461 8 18.874V26C8 26.5304 8.21071 27.0391 8.58579 27.4142C8.96086 27.7893 9.46957 28 10 28H13C13.5304 28 14.0391 27.7893 14.4142 27.4142C14.7893 27.0391 15 26.5304 15 26V24H17V26C17 26.5304 17.2107 27.0391 17.5858 27.4142C17.9609 27.7893 18.4696 28 19 28H22C22.5304 28 23.0391 27.7893 23.4142 27.4142C23.7893 27.0391 24 26.5304 24 26V18.872C24 18.459 23.9148 18.0504 23.7496 17.6718C23.5844 17.2932 23.3428 16.9529 23.04 16.672L17.36 11.4ZM10.32 18.14L16 12.864L21.68 18.14C21.7808 18.2335 21.8612 18.3467 21.9163 18.4727C21.9713 18.5986 21.9998 18.7345 22 18.872V26H19V24C19 23.4696 18.7893 22.9609 18.4142 22.5858C18.0391 22.2107 17.5304 22 17 22H15C14.4696 22 13.9609 22.2107 13.5858 22.5858C13.2107 22.9609 13 23.4696 13 24V26H10V18.872C10.0002 18.7345 10.0287 18.5986 10.0837 18.4727C10.1388 18.3467 10.2192 18.2335 10.32 18.14Z"
                                fill="#132364" />
                        </svg>

                        <h6 class="text-lg font-semibold text-[#1A1A1A]">Residential Properties</h6>

                    </div>
                    <p class="text-[#1A1A1A] text-md mx-auto">Perfect for families, individuals, or investors seeking
                        comfortable living spaces.</p>
                    <ul class="list-disc flex flex-col gap-2 text-black mt-2 pl-6">
                        <li>Single-Family Homes</li>
                        <li>Townhouses & Duplexes</li>
                        <li>Condos & Apartments</li>
                        <li>Vacation Rentals & Cabins</li>
                        <li>Multi-Family Homes</li>
                    </ul>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-lg shadow-lg px-4 py-3 flex gap-4 items-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" fill="none">
                            <path
                                d="M2.504 0C1.124 0 0.00400019 1.12 0.00400019 2.5L0 19.5C0 20.88 1.12 22 2.5 22H6V18.87C6.00003 18.1822 6.14196 17.5018 6.41692 16.8714C6.69188 16.2409 7.09395 15.674 7.598 15.206L8.902 13.996C8.7104 13.9771 8.52834 13.9032 8.37768 13.7834C8.22702 13.6635 8.11417 13.5027 8.05268 13.3202C7.99119 13.1378 7.98368 12.9414 8.03104 12.7548C8.07841 12.5682 8.17864 12.3992 8.3197 12.2682C8.46076 12.1372 8.63665 12.0496 8.82625 12.0161C9.01584 11.9826 9.21108 12.0045 9.38851 12.0793C9.56594 12.154 9.71803 12.2784 9.8265 12.4375C9.93497 12.5965 9.99522 12.7835 10 12.976L13.28 9.932C13.9063 9.35076 14.7022 8.98534 15.5512 8.88924C16.4002 8.79315 17.2577 8.97144 17.998 9.398C17.9717 8.75314 17.697 8.14345 17.2314 7.6965C16.7658 7.24955 16.1454 6.99998 15.5 7H14.506C14.3734 7 14.2462 6.94732 14.1524 6.85355C14.0587 6.75979 14.006 6.63261 14.006 6.5L14.01 2.502C14.01 1.122 12.89 0 11.51 0H2.504ZM5 6C4.73478 6 4.48043 5.89464 4.29289 5.70711C4.10536 5.51957 4 5.26522 4 5C4 4.73478 4.10536 4.48043 4.29289 4.29289C4.48043 4.10536 4.73478 4 5 4C5.26522 4 5.51957 4.10536 5.70711 4.29289C5.89464 4.48043 6 4.73478 6 5C6 5.26522 5.89464 5.51957 5.70711 5.70711C5.51957 5.89464 5.26522 6 5 6ZM6 9C6 9.26522 5.89464 9.51957 5.70711 9.70711C5.51957 9.89464 5.26522 10 5 10C4.73478 10 4.48043 9.89464 4.29289 9.70711C4.10536 9.51957 4 9.26522 4 9C4 8.73478 4.10536 8.48043 4.29289 8.29289C4.48043 8.10536 4.73478 8 5 8C5.26522 8 5.51957 8.10536 5.70711 8.29289C5.89464 8.48043 6 8.73478 6 9ZM5 14C4.73478 14 4.48043 13.8946 4.29289 13.7071C4.10536 13.5196 4 13.2652 4 13C4 12.7348 4.10536 12.4804 4.29289 12.2929C4.48043 12.1054 4.73478 12 5 12C5.26522 12 5.51957 12.1054 5.70711 12.2929C5.89464 12.4804 6 12.7348 6 13C6 13.2652 5.89464 13.5196 5.70711 13.7071C5.51957 13.8946 5.26522 14 5 14ZM10 5C10 5.26522 9.89464 5.51957 9.70711 5.70711C9.51957 5.89464 9.26522 6 9 6C8.73478 6 8.48043 5.89464 8.29289 5.70711C8.10536 5.51957 8 5.26522 8 5C8 4.73478 8.10536 4.48043 8.29289 4.29289C8.48043 4.10536 8.73478 4 9 4C9.26522 4 9.51957 4.10536 9.70711 4.29289C9.89464 4.48043 10 4.73478 10 5ZM9 10C8.73478 10 8.48043 9.89464 8.29289 9.70711C8.10536 9.51957 8 9.26522 8 9C8 8.73478 8.10536 8.48043 8.29289 8.29289C8.48043 8.10536 8.73478 8 9 8C9.26522 8 9.51957 8.10536 9.70711 8.29289C9.89464 8.48043 10 8.73478 10 9C10 9.26522 9.89464 9.51957 9.70711 9.70711C9.51957 9.89464 9.26522 10 9 10ZM17.36 11.4C16.9902 11.057 16.5044 10.8664 16 10.8664C15.4956 10.8664 15.0098 11.057 14.64 11.4L8.96 16.674C8.65716 16.9549 8.41557 17.2952 8.25038 17.6738C8.08519 18.0524 7.99995 18.461 8 18.874V26C8 26.5304 8.21071 27.0391 8.58579 27.4142C8.96086 27.7893 9.46957 28 10 28H13C13.5304 28 14.0391 27.7893 14.4142 27.4142C14.7893 27.0391 15 26.5304 15 26V24H17V26C17 26.5304 17.2107 27.0391 17.5858 27.4142C17.9609 27.7893 18.4696 28 19 28H22C22.5304 28 23.0391 27.7893 23.4142 27.4142C23.7893 27.0391 24 26.5304 24 26V18.872C24 18.459 23.9148 18.0504 23.7496 17.6718C23.5844 17.2932 23.3428 16.9529 23.04 16.672L17.36 11.4ZM10.32 18.14L16 12.864L21.68 18.14C21.7808 18.2335 21.8612 18.3467 21.9163 18.4727C21.9713 18.5986 21.9998 18.7345 22 18.872V26H19V24C19 23.4696 18.7893 22.9609 18.4142 22.5858C18.0391 22.2107 17.5304 22 17 22H15C14.4696 22 13.9609 22.2107 13.5858 22.5858C13.2107 22.9609 13 23.4696 13 24V26H10V18.872C10.0002 18.7345 10.0287 18.5986 10.0837 18.4727C10.1388 18.3467 10.2192 18.2335 10.32 18.14Z"
                                fill="#132364" />
                        </svg>

                        <h6 class="text-lg font-semibold text-[#1A1A1A]">Residential Properties</h6>

                    </div>
                    <p class="text-[#1A1A1A] text-md mx-auto">Perfect for families, individuals, or investors seeking
                        comfortable living spaces.</p>
                    <ul class="list-disc flex flex-col gap-2 text-black mt-2 pl-6">
                        <li>Single-Family Homes</li>
                        <li>Townhouses & Duplexes</li>
                        <li>Condos & Apartments</li>
                        <li>Vacation Rentals & Cabins</li>
                        <li>Multi-Family Homes</li>
                    </ul>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="bg-white rounded-lg shadow-lg px-4 py-3 flex gap-4 items-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" fill="none">
                            <path
                                d="M2.504 0C1.124 0 0.00400019 1.12 0.00400019 2.5L0 19.5C0 20.88 1.12 22 2.5 22H6V18.87C6.00003 18.1822 6.14196 17.5018 6.41692 16.8714C6.69188 16.2409 7.09395 15.674 7.598 15.206L8.902 13.996C8.7104 13.9771 8.52834 13.9032 8.37768 13.7834C8.22702 13.6635 8.11417 13.5027 8.05268 13.3202C7.99119 13.1378 7.98368 12.9414 8.03104 12.7548C8.07841 12.5682 8.17864 12.3992 8.3197 12.2682C8.46076 12.1372 8.63665 12.0496 8.82625 12.0161C9.01584 11.9826 9.21108 12.0045 9.38851 12.0793C9.56594 12.154 9.71803 12.2784 9.8265 12.4375C9.93497 12.5965 9.99522 12.7835 10 12.976L13.28 9.932C13.9063 9.35076 14.7022 8.98534 15.5512 8.88924C16.4002 8.79315 17.2577 8.97144 17.998 9.398C17.9717 8.75314 17.697 8.14345 17.2314 7.6965C16.7658 7.24955 16.1454 6.99998 15.5 7H14.506C14.3734 7 14.2462 6.94732 14.1524 6.85355C14.0587 6.75979 14.006 6.63261 14.006 6.5L14.01 2.502C14.01 1.122 12.89 0 11.51 0H2.504ZM5 6C4.73478 6 4.48043 5.89464 4.29289 5.70711C4.10536 5.51957 4 5.26522 4 5C4 4.73478 4.10536 4.48043 4.29289 4.29289C4.48043 4.10536 4.73478 4 5 4C5.26522 4 5.51957 4.10536 5.70711 4.29289C5.89464 4.48043 6 4.73478 6 5C6 5.26522 5.89464 5.51957 5.70711 5.70711C5.51957 5.89464 5.26522 6 5 6ZM6 9C6 9.26522 5.89464 9.51957 5.70711 9.70711C5.51957 9.89464 5.26522 10 5 10C4.73478 10 4.48043 9.89464 4.29289 9.70711C4.10536 9.51957 4 9.26522 4 9C4 8.73478 4.10536 8.48043 4.29289 8.29289C4.48043 8.10536 4.73478 8 5 8C5.26522 8 5.51957 8.10536 5.70711 8.29289C5.89464 8.48043 6 8.73478 6 9ZM5 14C4.73478 14 4.48043 13.8946 4.29289 13.7071C4.10536 13.5196 4 13.2652 4 13C4 12.7348 4.10536 12.4804 4.29289 12.2929C4.48043 12.1054 4.73478 12 5 12C5.26522 12 5.51957 12.1054 5.70711 12.2929C5.89464 12.4804 6 12.7348 6 13C6 13.2652 5.89464 13.5196 5.70711 13.7071C5.51957 13.8946 5.26522 14 5 14ZM10 5C10 5.26522 9.89464 5.51957 9.70711 5.70711C9.51957 5.89464 9.26522 6 9 6C8.73478 6 8.48043 5.89464 8.29289 5.70711C8.10536 5.51957 8 5.26522 8 5C8 4.73478 8.10536 4.48043 8.29289 4.29289C8.48043 4.10536 8.73478 4 9 4C9.26522 4 9.51957 4.10536 9.70711 4.29289C9.89464 4.48043 10 4.73478 10 5ZM9 10C8.73478 10 8.48043 9.89464 8.29289 9.70711C8.10536 9.51957 8 9.26522 8 9C8 8.73478 8.10536 8.48043 8.29289 8.29289C8.48043 8.10536 8.73478 8 9 8C9.26522 8 9.51957 8.10536 9.70711 8.29289C9.89464 8.48043 10 8.73478 10 9C10 9.26522 9.89464 9.51957 9.70711 9.70711C9.51957 9.89464 9.26522 10 9 10ZM17.36 11.4C16.9902 11.057 16.5044 10.8664 16 10.8664C15.4956 10.8664 15.0098 11.057 14.64 11.4L8.96 16.674C8.65716 16.9549 8.41557 17.2952 8.25038 17.6738C8.08519 18.0524 7.99995 18.461 8 18.874V26C8 26.5304 8.21071 27.0391 8.58579 27.4142C8.96086 27.7893 9.46957 28 10 28H13C13.5304 28 14.0391 27.7893 14.4142 27.4142C14.7893 27.0391 15 26.5304 15 26V24H17V26C17 26.5304 17.2107 27.0391 17.5858 27.4142C17.9609 27.7893 18.4696 28 19 28H22C22.5304 28 23.0391 27.7893 23.4142 27.4142C23.7893 27.0391 24 26.5304 24 26V18.872C24 18.459 23.9148 18.0504 23.7496 17.6718C23.5844 17.2932 23.3428 16.9529 23.04 16.672L17.36 11.4ZM10.32 18.14L16 12.864L21.68 18.14C21.7808 18.2335 21.8612 18.3467 21.9163 18.4727C21.9713 18.5986 21.9998 18.7345 22 18.872V26H19V24C19 23.4696 18.7893 22.9609 18.4142 22.5858C18.0391 22.2107 17.5304 22 17 22H15C14.4696 22 13.9609 22.2107 13.5858 22.5858C13.2107 22.9609 13 23.4696 13 24V26H10V18.872C10.0002 18.7345 10.0287 18.5986 10.0837 18.4727C10.1388 18.3467 10.2192 18.2335 10.32 18.14Z"
                                fill="#132364" />
                        </svg>

                        <h6 class="text-lg font-semibold text-[#1A1A1A]">Residential Properties</h6>

                    </div>
                    <p class="text-[#1A1A1A] text-md mx-auto">Perfect for families, individuals, or investors seeking
                        comfortable living spaces.</p>
                    <ul class="list-disc flex flex-col gap-2 text-black mt-2 pl-6">
                        <li>Single-Family Homes</li>
                        <li>Townhouses & Duplexes</li>
                        <li>Condos & Apartments</li>
                        <li>Vacation Rentals & Cabins</li>
                        <li>Multi-Family Homes</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="my-20 flex flex-col gap-8 max-w-[1520px] mx-auto w-full">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-3">
                <h5 class="text-3xl font-bold text-black/90 ">Property Tips & Market Insights</h5>
                <p class=" text-[#1A1A1A] text-md mx-auto">
                    Stay informed with the latest updates on Pakistan’s real estate trends.
                </p>
            </div>
            <button
                class="px-4 py-2 font-semibold rounded-lg text-[#1A1A1A] border border-[#1A1A1A] text-lg  transition-all hover:scale[1.1] cursor-pointer">
                Read More Articles
            </button>

        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-2 pb-4 rounded-2xl shadow-2xl flex flex-col gap-3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/blog.png" alt="Blog Image"
                    class="w-full h-48 object-cover rounded-2xl" />
                <h6 class="text-[16px] font-semibold text-[#132364] pl-2"> 17 Jan 2022</h6>
                <div class="flex items-center gap-4  px-2">
                    <h6 class="text-lg font-semibold text-[#101828] pl-2">Top 5 Investment Areas in Lahore for 2025</h6>
                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="34" viewBox="0 0 24 24" fill="none">
                        <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#101828" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <p class="text-[#667085] font-light text-[15px] px-2">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the read more
                </p>
            </div>
            <div class="bg-white p-2 pb-4 rounded-2xl shadow-2xl flex flex-col gap-3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/blog.png" alt="Blog Image"
                    class="w-full h-48 object-cover rounded-2xl" />
                <h6 class="text-[16px] font-semibold text-[#132364] pl-2"> 17 Jan 2022</h6>
                <div class="flex items-center gap-4  px-2">
                    <h6 class="text-lg font-semibold text-[#101828] pl-2">Top 5 Investment Areas in Lahore for 2025</h6>
                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="34" viewBox="0 0 24 24" fill="none">
                        <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#101828" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <p class="text-[#667085] font-light text-[15px] px-2">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the read more
                </p>
            </div>
            <div class="bg-white p-2 pb-4 rounded-2xl shadow-2xl flex flex-col gap-3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/blog.png" alt="Blog Image"
                    class="w-full h-48 object-cover rounded-2xl" />
                <h6 class="text-[16px] font-semibold text-[#132364] pl-2"> 17 Jan 2022</h6>
                <div class="flex items-center gap-4  px-2">
                    <h6 class="text-lg font-semibold text-[#101828] pl-2">Top 5 Investment Areas in Lahore for 2025</h6>
                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="34" viewBox="0 0 24 24" fill="none">
                        <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#101828" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <p class="text-[#667085] font-light text-[15px] px-2">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the read more
                </p>
            </div>
            <div class="bg-white p-2 pb-4 rounded-2xl shadow-2xl flex flex-col gap-3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/blog.png" alt="Blog Image"
                    class="w-full h-48 object-cover rounded-2xl" />
                <h6 class="text-[16px] font-semibold text-[#132364] pl-2"> 17 Jan 2022</h6>
                <div class="flex items-center gap-4  px-2">
                    <h6 class="text-lg font-semibold text-[#101828] pl-2">Top 5 Investment Areas in Lahore for 2025</h6>
                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="34" viewBox="0 0 24 24" fill="none">
                        <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#101828" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <p class="text-[#667085] font-light text-[15px] px-2">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the read more
                </p>
            </div>
        </div>
    </div>

  <script>
        function propertyList() {
            return {
                properties: [],
                loading: true,
                async loadProperties() {
                    try {
                        const response = await fetch(propertyTheme.rest_url + 'property-theme/v1/properties/search?featured=true&per_page=6', {
                            headers: {
                                'X-WP-Nonce': propertyTheme.nonce,
                            }
                        });
                        const data = await response.json();
                        this.properties = data.properties || [];
                    } catch (error) {
                        console.error('Error loading properties:', error);
                    } finally {
                        this.loading = false;
                    }
                }
            }
        }
    </script>



    <?php get_footer(); ?>