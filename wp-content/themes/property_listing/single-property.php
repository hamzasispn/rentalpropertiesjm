<?php
/**
 * Single Property Template
 * Updated with full address display, amenities badges, and Mapbox map
 */
get_header();

while (have_posts()) : the_post();
    $property_id = get_the_ID();
    
    // Get property data
    $price = get_post_meta($property_id, '_property_price', true);
    $area = get_post_meta($property_id, '_property_area', true);
    $bedrooms = get_post_meta($property_id, '_property_bedrooms', true);
    $bathrooms = get_post_meta($property_id, '_property_bathrooms', true);
    $featured = get_post_meta($property_id, '_property_featured', true);
    $gallery = get_post_meta($property_id, '_property_gallery', true);
    $amenities_data = get_post_meta($property_id, '_property_amenities_data', true);
    
    // Get status (new field with rent/for_sale only)
    $status = get_post_meta($property_id, 'property_status', true);
    if (empty($status)) {
        // Fallback to old status field
        $status = get_post_meta($property_id, '_property_status', true);
    }
    
    // Get full address details
    $full_address = property_theme_get_full_address($property_id);
    $coords = property_theme_get_property_coords($property_id);
    
    // Get property type
    $property_types = wp_get_post_terms($property_id, 'property_type');
    $property_type = !empty($property_types) ? $property_types[0]->name : '';
    
    // Format price
    $formatted_price = number_format((float) $price);
?>

<article class="min-h-screen bg-slate-50 mt-[100px]">
    <!-- Hero Section with Gallery -->
    <div class="relative">
        <?php if (has_post_thumbnail()) : ?>
            <div class="h-[60vh] w-full">
                <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
            </div>
        <?php else : ?>
            <div class="h-[60vh] w-full bg-slate-300 flex items-center justify-center">
                <span class="text-slate-500 text-xl">No Image Available</span>
            </div>
        <?php endif; ?>
        
        <!-- Overlay with Title -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent">
            <div class="absolute bottom-0 left-0 right-0 p-8 max-w-7xl mx-auto">
                <div class="flex items-center gap-3 mb-4">
                    <?php if ($featured) : ?>
                        <span class="bg-amber-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Featured</span>
                    <?php endif; ?>
                    <?php if ($property_type) : ?>
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold"><?php echo esc_html($property_type); ?></span>
                    <?php endif; ?>
                    <?php if ($status) : ?>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold <?php echo $status === 'rent' ? 'bg-green-600 text-white' : 'bg-purple-600 text-white'; ?>">
                            <?php echo $status === 'rent' ? 'For Rent' : 'For Sale'; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <h1 class="text-4xl font-bold text-white mb-2"><?php the_title(); ?></h1>
                <p class="text-white/80 text-lg"><?php echo esc_html($full_address['address']); ?></p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Key Details Card -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600">$<?php echo $formatted_price; ?></div>
                            <div class="text-sm text-slate-600"><?php echo $status === 'rent' ? 'per month' : 'Price'; ?></div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-slate-900"><?php echo esc_html($bedrooms ?: '-'); ?></div>
                            <div class="text-sm text-slate-600">Bedrooms</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-slate-900"><?php echo esc_html($bathrooms ?: '-'); ?></div>
                            <div class="text-sm text-slate-600">Bathrooms</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-slate-900"><?php echo esc_html($area ?: '-'); ?></div>
                            <div class="text-sm text-slate-600">Sq Ft</div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">Description</h2>
                    <div class="prose prose-slate max-w-none">
                        <?php the_content(); ?>
                    </div>
                </div>

                <!-- Amenities Section with Badges/Icons -->
                <?php if (!empty($amenities_data) && is_array($amenities_data)) : ?>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6">Features & Amenities</h2>
                        <div class="space-y-6">
                            <?php foreach ($amenities_data as $group) : ?>
                                <?php if (!empty($group['title']) || !empty($group['amenities'])) : ?>
                                    <div>
                                        <?php if (!empty($group['title'])) : ?>
                                            <h3 class="text-lg font-semibold text-slate-800 mb-4"><?php echo esc_html($group['title']); ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($group['amenities']) && is_array($group['amenities'])) : ?>
                                            <div class="flex flex-wrap gap-3">
                                                <?php foreach ($group['amenities'] as $amenity) : ?>
                                                    <div class="flex items-center gap-2 bg-slate-100 px-4 py-2 rounded-full">
                                                        <?php if (!empty($amenity['icon'])) : ?>
                                                            <img src="<?php echo esc_url($amenity['icon']); ?>" alt="" class="w-5 h-5">
                                                        <?php else : ?>
                                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                        <?php endif; ?>
                                                        <span class="text-sm font-medium text-slate-700"><?php echo esc_html($amenity['title']); ?></span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Gallery Section -->
                <?php if (!empty($gallery) && is_array($gallery)) : ?>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6">Gallery</h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4" x-data="{ lightboxOpen: false, currentMedia: null, currentType: 'image' }">
                            <?php foreach ($gallery as $index => $item) : ?>
                                <?php if ($item['type'] === 'image') : ?>
                                    <div class="aspect-video bg-slate-200 rounded-lg overflow-hidden cursor-pointer hover:opacity-90 transition-opacity"
                                         @click="lightboxOpen = true; currentMedia = '<?php echo esc_url($item['media_url']); ?>'; currentType = 'image'">
                                        <img src="<?php echo esc_url($item['media_url']); ?>" alt="Gallery image <?php echo $index + 1; ?>" class="w-full h-full object-cover">
                                    </div>
                                <?php else : ?>
                                    <div class="aspect-video bg-slate-200 rounded-lg overflow-hidden cursor-pointer hover:opacity-90 transition-opacity relative"
                                         @click="lightboxOpen = true; currentMedia = '<?php echo esc_url($item['media_url']); ?>'; currentType = 'video'">
                                        <video src="<?php echo esc_url($item['media_url']); ?>" class="w-full h-full object-cover"></video>
                                        <div class="absolute inset-0 flex items-center justify-center bg-black/30">
                                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                            <!-- Lightbox -->
                            <div x-show="lightboxOpen" x-cloak
                                 class="fixed inset-0 z-50 flex items-center justify-center bg-black/90"
                                 @click.self="lightboxOpen = false"
                                 @keydown.escape.window="lightboxOpen = false">
                                <button @click="lightboxOpen = false" class="absolute top-4 right-4 text-white hover:text-slate-300">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                                <template x-if="currentType === 'image'">
                                    <img :src="currentMedia" class="max-w-full max-h-[90vh] object-contain">
                                </template>
                                <template x-if="currentType === 'video'">
                                    <video :src="currentMedia" controls autoplay class="max-w-full max-h-[90vh]"></video>
                                </template>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Map Section -->
                <?php if (!empty($coords['lat']) && !empty($coords['lng'])) : ?>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6">Location on Map</h2>
                        <div id="single-property-map" class="w-full h-96 rounded-lg border border-slate-200"></div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <!-- Price Card -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="text-center mb-6">
                            <div class="text-4xl font-bold text-blue-600">$<?php echo $formatted_price; ?></div>
                            <div class="text-slate-600"><?php echo $status === 'rent' ? 'per month' : ''; ?></div>
                        </div>
                        
                        <div class="space-y-3">
                            <a href="#contact-form" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg text-center transition-colors">
                                Contact Agent
                            </a>
                            <button type="button" class="w-full bg-slate-100 hover:bg-slate-200 text-slate-900 font-semibold py-3 px-4 rounded-lg transition-colors">
                                Schedule Viewing
                            </button>
                        </div>
                    </div>

                    <!-- Quick Info -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Quick Info</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-slate-600">Property ID</span>
                                <span class="font-medium text-slate-900">#<?php echo $property_id; ?></span>
                            </div>
                            <?php if ($property_type) : ?>
                                <div class="flex justify-between">
                                    <span class="text-slate-600">Type</span>
                                    <span class="font-medium text-slate-900"><?php echo esc_html($property_type); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="flex justify-between">
                                <span class="text-slate-600">Status</span>
                                <span class="font-medium <?php echo $status === 'rent' ? 'text-green-600' : 'text-purple-600'; ?>">
                                    <?php echo $status === 'rent' ? 'For Rent' : 'For Sale'; ?>
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-600">Listed</span>
                                <span class="font-medium text-slate-900"><?php echo get_the_date(); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Share -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Share Property</h3>
                        <div class="flex gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" rel="noopener" 
                               class="flex-1 bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded-lg text-center text-sm font-medium transition-colors">
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                               target="_blank" rel="noopener"
                               class="flex-1 bg-sky-500 hover:bg-sky-600 text-white py-2 px-4 rounded-lg text-center text-sm font-medium transition-colors">
                                Twitter
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" 
                               target="_blank" rel="noopener"
                               class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg text-center text-sm font-medium transition-colors">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<?php endwhile; ?>

<?php get_footer(); ?>
