<?php
/**
 * User Dashboard Page Template with Sidebar
 * Template Name: Dashboard
 */

require_once get_template_directory() . '/inc/subscription/stripe-products-setup.php';


if (!is_user_logged_in()) {
    wp_redirect(wp_login_url(get_permalink()));
    exit;
}

get_header();

$logo = get_option('mytheme_logo');
$user_id = get_current_user_id();
$user = wp_get_current_user();
$stats = property_theme_get_subscription_stats($user_id);
$subscription = property_theme_get_user_subscription($user_id);

?>

<div class="min-h-screen bg-slate-50 flex dashboard-page">
    <!-- Sidebar Navigation -->
    <div class="w-64 bg-slate-900 text-white flex flex-col fixed top-0 z-[99] h-screen border-b border-gray-50/10">

        <a href="<?= home_url(); ?>" class="px-6 py-3 border-r border-b border-gray-50/10 w-64">
            <?php if ($logo): ?>
                <img src="<?php echo esc_url($logo); ?>" alt="Logo"
                     class="h-[60px] object-contain filter invert brightness-0">
            <?php else: ?>
                <span class="text-2xl font-bold text-white-900">Rental Properties JM</span>
            <?php endif; ?>
        </a>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-8 space-y-2">
            <a href="#overview" data-tab="overview"
               class="nav-link px-4 py-3 rounded-lg hover:bg-slate-800 transition block font-semibold active">
                📊 Overview
            </a>
            <a href="#properties" data-tab="properties"
               class="nav-link px-4 py-3 rounded-lg hover:bg-slate-800 transition block">
                🏠 My Properties
            </a>
            <a href="#add-property" data-tab="add-property"
               class="nav-link px-4 py-3 rounded-lg hover:bg-slate-800 transition block">
                ➕ Add Property
            </a>
            <a href="#analytics" data-tab="analytics"
               class="nav-link px-4 py-3 rounded-lg hover:bg-slate-800 transition block">
                📈 Analytics
            </a>
            <a href="#billing" data-tab="billing"
               class="nav-link px-4 py-3 rounded-lg hover:bg-slate-800 transition block">
                💳 Billing
            </a>
            <a href="#settings" data-tab="settings"
               class="nav-link px-4 py-3 rounded-lg hover:bg-slate-800 transition block">
                ⚙️ Settings
            </a>
        </nav>

        <!-- User Info -->
        <div class="px-6 py-6 border-t border-slate-800">
            <p class="text-sm text-slate-400">Logged in as</p>
            <p class="font-semibold mt-1"><?php echo esc_html($user->display_name); ?></p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64 flex-1 overflow-y-auto relative py-[5rem]">
        <div class="bg-slate-900 flex items-center justify-end top-0 left-0 fixed w-full z-10 h-[85px] px-4 py-2">
            <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>"
               class="text-xs text-slate-400 p-2 flex items-center justify-center rounded bg-white/10 w-12 h-12 border border-white/20 ">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                     class="fill-current w-full h-full" viewBox="0 0 24 24">
                    <g>
                        <g fill-rule="evenodd">
                            <path
                                    d="M11.112.815a5.25 5.25 0 1 0 0 10.5 5.25 5.25 0 0 0 0-10.5zM19.652 12.09c-.486-.55-1.2-.9-1.993-.9H15.75a2.658 2.658 0 0 0-2.658 2.659v6.678a2.658 2.658 0 0 0 2.658 2.658h1.908c.794 0 1.507-.35 1.993-.9a.75.75 0 0 0-1.124-.992 1.153 1.153 0 0 1-.87.392h-1.907c-.64 0-1.158-.519-1.158-1.158v-6.678c0-.64.518-1.159 1.158-1.159h1.908c.346 0 .655.151.869.393a.75.75 0 0 0 1.124-.993z"
                                    class="fill-current"></path>
                            <path
                                    d="M22.497 16.657a.75.75 0 0 1 0 1.06l-2 2a.75.75 0 0 1-1.061-1.06l2-2a.75.75 0 0 1 1.06 0z"
                                    class="fill-current"></path>
                            <path
                                    d="M22.497 17.718a.75.75 0 0 0 0-1.06l-2-2a.75.75 0 0 0-1.061 1.06l2 2a.75.75 0 0 0 1.06 0z"
                                    class="fill-current"></path>
                            <path d="M15.716 17.188a.75.75 0 0 1 .75-.75h5a.75.75 0 0 1 0 1.5h-5a.75.75 0 0 1-.75-.75z"
                                  class="fill-current"></path>
                        </g>
                        <path
                                d="M11.608 13.49c-.01.119-.015.238-.015.359v6.678c0 .746.196 1.445.54 2.05h-9.11a1.75 1.75 0 0 1-1.75-1.75v-3.671c0-.613.338-1.176.88-1.464a18.895 18.895 0 0 1 9.455-2.201z"
                                class="fill-current"></path>
                    </g>
                </svg>
            </a>
        </div>

        <div class="p-8">
            <!-- Overview Tab -->
            <div id="overview" class="tab-content active space-y-6">
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <h1 class="text-4xl font-bold text-slate-900">Welcome,
                            <?php echo esc_html($user->display_name); ?>
                        </h1>
                        <p class="text-slate-600 mt-2">Manage your properties and subscription</p>
                    </div>
                </div>

                <!-- Subscription Card -->
                <div class="bg-white rounded-lg shadow p-8">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-slate-900">
                                <?php echo esc_html($stats['plan']['name'] ?? 'No Plan'); ?> Plan
                            </h2>
                            <p class="text-slate-600 mt-1">Your current subscription</p>
                        </div>
                        <span class="px-4 py-2 bg-green-100 text-green-800 rounded-full font-semibold text-sm">
                        <?php echo $stats['subscription'] ? 'Active' : 'Inactive'; ?>
                    </span>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                        <div class="border-l-4 border-blue-600 pl-4">
                            <p class="text-slate-600 text-sm">Properties</p>
                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                <span><?php echo esc_html($stats['published_properties']); ?></span>/<span><?php echo esc_html($stats['plan']['max_properties']); ?></span>
                            </p>
                        </div>
                        <div class="border-l-4 border-amber-600 pl-4">
                            <p class="text-slate-600 text-sm">Featured (this month)</p>
                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                <span><?php echo esc_html($stats['featured_this_month']); ?></span>/<span><?php echo esc_html($stats['plan']['featured_limit']); ?></span>
                            </p>
                        </div>
                        <div class="border-l-4 border-green-600 pl-4">
                            <p class="text-slate-600 text-sm">Total Views</p>
                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                <?php echo esc_html($stats['total_views']); ?>
                            </p>
                        </div>
                        <div class="border-l-4 border-purple-600 pl-4">
                            <p class="text-slate-600 text-sm">Days Remaining</p>
                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                <?php echo esc_html($stats['days_remaining']); ?>
                            </p>
                        </div>
                    </div>

                    <!-- Analytics Chart -->
                    <div class="bg-slate-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Analytics Overview</h3>
                        <canvas id="analyticsChart" height="80"></canvas>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <a href="#add-property" data-tab="add-property"
                           class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">+ New
                            Property</a>
                        <a href="#billing" data-tab="billing"
                           class="px-6 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition">View
                            Plans</a>
                    </div>
                </div>
            </div>

            <!-- Properties Tab -->
            <div id="properties" class="tab-content hidden space-y-6">
                <h1 class="text-3xl font-bold text-slate-900">My Properties</h1>

                <div class="bg-white rounded-lg shadow p-8">
                    <?php
                    $user_properties = get_posts(array(
                            'post_type' => 'property',
                            'author' => $user_id,
                            'numberposts' => -1,
                    ));

                    if (!empty($user_properties)): ?>
                        <div class="space-y-4">
                            <?php foreach ($user_properties as $property):
                                $price = get_post_meta($property->ID, '_property_price', true);
                                $featured = get_post_meta($property->ID, '_property_featured', true);
                                $leads_count = get_posts(array(
                                        'post_type' => 'property',
                                        'post__in' => array($property->ID),
                                        'numberposts' => -1,
                                ));
                                ?>
                                <div class="flex items-center justify-between border-b pb-4">
                                    <div>
                                        <h4 class="font-semibold text-slate-900"><?php echo esc_html($property->post_title); ?>
                                        </h4>
                                        <p class="text-slate-600 text-sm">Price:
                                            $<?php echo esc_html(number_format(intval($price))); ?></p>
                                    </div>
                                    <div class="flex gap-2">
                                        <?php if ($featured): ?>
                                            <span class="px-3 py-1 bg-amber-100 text-amber-800 text-sm rounded">⭐ Featured</span>
                                        <?php endif; ?>
                                        <a href="<?php echo esc_url(home_url('/add-property?property_id=' . $property->ID)); ?>"
                                           class="px-3 py-1 text-blue-600 hover:underline">Edit</a>
                                        <a href="<?php echo esc_url(get_permalink($property->ID)); ?>"
                                           class="px-3 py-1 text-blue-600 hover:underline">View</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-slate-600">You haven't created any properties yet. <a href="#add-property" data-tab="add-property"
                                                                                             class="text-blue-600 hover:underline">Create your first property</a></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Add Property Section in Dashboard -->
            <div id="add-property" class="tab-content hidden space-y-6">
                <?php include(get_template_directory() . '/add-property.php'); ?>
            </div>

            <!-- Analytics Tab -->
            <div id="analytics" class="tab-content hidden space-y-6">
                <h1 class="text-3xl font-bold text-slate-900">Analytics & Leads</h1>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-slate-600 text-sm font-semibold">Total Views</h3>
                        <p class="text-4xl font-bold text-slate-900 mt-2"><?php echo esc_html($stats['total_views']); ?>
                        </p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-slate-600 text-sm font-semibold">Active Properties</h3>
                        <p class="text-4xl font-bold text-slate-900 mt-2">
                            <?php echo esc_html($stats['published_properties']); ?>
                        </p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-slate-600 text-sm font-semibold">Days Left</h3>
                        <p class="text-4xl font-bold text-slate-900 mt-2">
                            <?php echo esc_html($stats['days_remaining']); ?>
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Property Performance</h3>
                    <div class="space-y-4">
                        <?php foreach ($user_properties as $property):
                            global $wpdb;
                            $views = intval($wpdb->get_var($wpdb->prepare(
                                    "SELECT COUNT(*) FROM {$wpdb->prefix}property_analytics WHERE property_id = %d AND event_type = 'page_view'",
                                    $property->ID
                            )));
                            $leads = intval($wpdb->get_var($wpdb->prepare(
                                    "SELECT COUNT(*) FROM {$wpdb->prefix}property_leads WHERE property_id = %d",
                                    $property->ID
                            )));
                            ?>
                            <div class="border rounded-lg p-4 flex justify-between items-center">
                                <div>
                                    <h4 class="font-semibold text-slate-900"><?php echo esc_html($property->post_title); ?>
                                    </h4>
                                    <p class="text-slate-600 text-sm mt-1"><?php echo $views; ?> views •
                                        <?php echo $leads; ?> leads
                                    </p>
                                </div>
                                <div class="flex gap-2">
                                    <a href="tel:+1234567890"
                                       class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm">📞
                                        Call</a>
                                    <a href="https://wa.me/1234567890" target="_blank"
                                       class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition text-sm">💬
                                        WhatsApp</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Billing Tab -->
            <div id="billing" class="tab-content hidden space-y-6">
                <h1 class="text-3xl font-bold text-slate-900">Billing & Subscription</h1>

                <!-- Current Plan -->
                <?php if ($stats['subscription']): ?>
                    <div class="bg-white rounded-lg shadow p-8">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6">Current Plan:
                            <?php echo esc_html($stats['plan']['name']); ?>
                        </h2>
                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <p class="text-slate-600 text-sm">Plan Price</p>
                                <p class="text-3xl font-bold text-slate-900 mt-1">
                                    $<?php echo esc_html($stats['plan']['price']); ?>/mo</p>
                            </div>
                            <div>
                                <p class="text-slate-600 text-sm">Expires</p>
                                <p class="text-xl font-bold text-slate-900 mt-1">
                                    <?php echo esc_html(date('M d, Y', strtotime($stats['subscription']->expiry_date))); ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <button
                                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition upgrade-plan-btn">⬆️
                                Upgrade Plan</button>
                            <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
                                    @click="confirmCancel()">
                                Cancel Subscription
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Available Plans -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php get_template_part('template-parts/component', 'plan-card'); ?>
                </div>
            </div>

            <!-- Settings Tab -->
            <div id="settings" class="tab-content hidden space-y-6">
                <h1 class="text-3xl font-bold text-slate-900">Account Settings</h1>

                <!-- Account Info -->
                <div class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6">Account Information</h2>
                    <div class="space-y-4">
                        <div>
                            <p class="text-slate-600 text-sm">Email</p>
                            <p class="font-semibold text-slate-900"><?php echo esc_html($user->user_email); ?></p>
                        </div>
                        <div>
                            <p class="text-slate-600 text-sm">Name</p>
                            <p class="font-semibold text-slate-900"><?php echo esc_html($user->display_name); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Agent Info (for leads contact) -->
                <div class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6">Contact Information for Leads</h2>
                    <div class="space-y-4" x-data="agentForm()">
                        <div>
                            <label class="block text-sm font-semibold text-slate-900 mb-2">Phone Number</label>
                            <input type="tel" x-model="phone" placeholder="+1 (555) 000-0000"
                                   class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-900 mb-2">WhatsApp Number</label>
                            <input type="tel" x-model="whatsapp" placeholder="+1 (555) 000-0000"
                                   class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <button @click="saveAgentInfo()"
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Save
                            Contact Info</button>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6">Payment Method</h2>

                    <?php
                    $payment_method = property_theme_get_payment_method($user_id);
                    if ($payment_method):
                        ?>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="flex items-center gap-2 text-slate-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 00-3-3H9a3 3 0 00-3 3z"></path>
                                </svg>
                                <span class="font-semibold"><?php echo esc_html($payment_method->brand); ?> •••• <?php echo esc_html(substr($payment_method->last4, -4)); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal for Upgrades -->
<div id="upgrade-payment-modal"
     class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-md w-full p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-slate-900">Upgrade Payment</h2>
            <button class="close-upgrade-modal text-slate-400 hover:text-slate-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="mb-6">
            <p class="text-slate-600 mb-2">You're upgrading to <span id="upgrade-plan-name"
                                                                     class="font-semibold text-slate-900"></span></p>
            <p class="text-2xl font-bold text-blue-600">Amount due: $<span id="upgrade-amount">0.00</span></p>
        </div>

        <form id="upgrade-payment-form" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Card Information</label>
                <div id="upgrade-card-element" class="p-4 border border-slate-300 rounded-lg bg-white"></div>
                <div id="upgrade-card-errors" class="text-red-600 text-sm mt-2" role="alert"></div>
            </div>

            <button type="submit" id="upgrade-submit-btn"
                    class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-slate-400 text-white font-bold py-3 px-4 rounded-lg transition">
                Complete Upgrade
            </button>

            <div id="upgrade-error"
                 class="hidden bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm"></div>
        </form>
    </div>
</div>

<!-- Update Payment Method Modal -->
<div id="update-payment-modal"
     class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-md w-full p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-slate-900">Update Payment Method</h2>
            <button class="close-update-payment-modal text-slate-400 hover:text-slate-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <form id="update-payment-form" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">New Card Information</label>
                <div id="update-card-element" class="p-4 border border-slate-300 rounded-lg bg-white"></div>
                <div id="update-card-errors" class="text-red-600 text-sm mt-2" role="alert"></div>
            </div>

            <button type="submit" id="update-payment-submit-btn"
                    class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-slate-400 text-white font-bold py-3 px-4 rounded-lg transition">
                Save Payment Method
            </button>

            <div id="update-payment-error"
                 class="hidden bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm"></div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Alpine.js function for agent form
    function agentForm() {
        return {
            phone: localStorage.getItem('agent_phone') || '',
            whatsapp: localStorage.getItem('agent_whatsapp') || '',
            saveAgentInfo() {
                localStorage.setItem('agent_phone', this.phone);
                localStorage.setItem('agent_whatsapp', this.whatsapp);
                alert('Contact information saved');
            }
        }
    }

    // Cancel Subscription
    function cancelSubscription(subscriptionId) {
        return {
            subscriptionId,
            loading: false,

            async confirmCancel() {
                if (!this.subscriptionId) {
                    alert('Subscription ID missing');
                    return;
                }

                if (!confirm('Are you sure you want to cancel your subscription?')) {
                    return;
                }

                this.loading = true;

                try {
                    const response = await fetch(
                        propertyTheme.rest_url + 'property-theme/v1/cancel-subscription',
                        {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-WP-Nonce': propertyTheme.nonce,
                            },
                            body: JSON.stringify({
                                id: this.subscriptionId,
                                at_period_end: true
                            })
                        }
                    );

                    const data = await response.json();

                    if (!response.ok) {
                        throw new Error(data.message || 'Cancel failed');
                    }

                    alert(data.message || 'Subscription will cancel at period end');
                    window.location.reload();

                } catch (error) {
                    console.error('[Cancel Subscription]', error);
                    alert(error.message);
                } finally {
                    this.loading = false;
                }
            }
        };
    }

    // Delete Account
    document.querySelector('.delete-account-btn')?.addEventListener('click', function () {
        if (confirm('This will permanently delete your account and all properties. This cannot be undone. Are you sure?')) {
            const password = prompt('Enter your password to confirm deletion:');
            if (password) {
                fetch(propertyTheme.rest_url + 'property-theme/v1/user/account/delete', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-WP-Nonce': propertyTheme.nonce,
                    },
                    body: JSON.stringify({ password: password })
                })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            alert('Account deleted. Redirecting...');
                            window.location.href = '/';
                        } else {
                            alert('Error deleting account');
                        }
                    });
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Tab Navigation
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const tab = this.dataset.tab;

                // Hide all tabs
                document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
                document.querySelectorAll('.nav-link').forEach(el => el.classList.remove('active', 'font-semibold'));

                // Show selected tab
                document.getElementById(tab).classList.remove('hidden');
                this.classList.add('active', 'font-semibold');
            });
        });

        // Upgrade Plan
        let selectedPlanId = null;
        let selectedPlanName = null;
        let upgradeAmount = 0;

        document.querySelectorAll('.upgrade-plan-btn').forEach(btn => {
            btn.addEventListener('click', async function () {
                selectedPlanId = this.dataset.planId;

                try {
                    const response = await fetch(propertyTheme.rest_url + 'property-theme/v1/subscription-plans/', {
                        headers: {
                            'X-WP-Nonce': propertyTheme.nonce,
                        }
                    });
                    const planData = await response.json();

                    const currentPrice = <?php echo $stats['plan']['price'] ?? 0; ?>;
                    const selectedPlan = planData.find(p => p.id == selectedPlanId);

                    if (!selectedPlan) {
                        console.error("Plan not found:", selectedPlanId);
                        alert("Selected plan not found.");
                        return;
                    }

                    const upgradeAmount = Math.max(0, selectedPlan.price - currentPrice);

                    // Update UI
                    document.getElementById('upgrade-plan-name').textContent = selectedPlan.name;
                    document.getElementById('upgrade-amount').textContent = upgradeAmount;

                    document.getElementById('upgrade-payment-modal').classList.remove('hidden');
                    upgradeCardElement.mount('#upgrade-card-element');
                } catch (error) {
                    console.error('[v0] Error fetching plan:', error);
                    alert('Error loading plan details');
                }
            });
        });

        document.querySelectorAll('.close-upgrade-modal').forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('upgrade-payment-modal').classList.add('hidden');
                upgradeCardElement.unmount();
            });
        });

        document.getElementById('upgrade-payment-form').addEventListener('submit', async function (e) {
            e.preventDefault();

            const submitBtn = document.getElementById('upgrade-submit-btn');
            const errorDiv = document.getElementById('upgrade-error');

            submitBtn.disabled = true;
            submitBtn.textContent = 'Processing...';
            errorDiv.classList.add('hidden');

            try {
                const { paymentMethod, error } = await stripe.createPaymentMethod({
                    type: 'card',
                    card: upgradeCardElement,
                });

                if (error) {
                    throw new Error(error.message);
                }

                const response = await fetch(propertyTheme.rest_url + 'property-theme/v1/user/subscription/upgrade', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-WP-Nonce': propertyTheme.nonce,
                    },
                    body: JSON.stringify({
                        plan_id: selectedPlanId,
                        payment_method_id: paymentMethod.id
                    })
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Upgrade failed');
                }

                alert('Successfully upgraded to ' + selectedPlanName + '!');
                location.reload();
            } catch (error) {
                console.error('[v0] Upgrade error:', error);
                errorDiv.textContent = error.message;
                errorDiv.classList.remove('hidden');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Complete Upgrade';
            }
        });

        document.querySelector('.update-payment-btn')?.addEventListener('click', function () {
            document.getElementById('update-payment-modal').classList.remove('hidden');
            updateCardElement.mount('#update-card-element');
        });

        document.querySelectorAll('.close-update-payment-modal').forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('update-payment-modal').classList.add('hidden');
                updateCardElement.unmount();
            });
        });

        document.getElementById('update-payment-form').addEventListener('submit', async function (e) {
            e.preventDefault();

            const submitBtn = document.getElementById('update-payment-submit-btn');
            const errorDiv = document.getElementById('update-payment-error');

            submitBtn.disabled = true;
            submitBtn.textContent = 'Saving...';
            errorDiv.classList.add('hidden');

            try {
                const { paymentMethod, error } = await stripe.createPaymentMethod({
                    type: 'card',
                    card: updateCardElement,
                });

                if (error) {
                    throw new Error(error.message);
                }

                const response = await fetch(propertyTheme.rest_url + 'property/v1/user/payment-method', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-WP-Nonce': propertyTheme.nonce,
                    },
                    body: JSON.stringify({
                        payment_method_id: paymentMethod.id
                    })
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Failed to update payment method');
                }

                alert('Payment method updated successfully!');
                location.reload();
            } catch (error) {
                console.error('[v0] Update payment error:', error);
                errorDiv.textContent = error.message;
                errorDiv.classList.remove('hidden');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Save Payment Method';
            }
        });

        document.querySelector('.toggle-auto-renew')?.addEventListener('change', async function () {
            const enabled = this.checked;

            try {
                const response = await fetch(propertyTheme.rest_url + 'property-theme/v1/user/subscription/auto-renew', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-WP-Nonce': propertyTheme.nonce,
                    },
                    body: JSON.stringify({ enabled })
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Failed to update auto-renew');
                }

                alert(enabled ? 'Auto-renew enabled' : 'Auto-renew disabled');
            } catch (error) {
                console.error('[v0] Auto-renew error:', error);
                alert('Error updating auto-renew setting');
                this.checked = !enabled; // Revert checkbox
            }
        });

        // Analytics Chart
        const ctx = document.getElementById('analyticsChart');
        if (ctx) {
            const analyticsData = <?php
                    global $wpdb;
                    $properties = get_posts(array('post_type' => 'property', 'author' => get_current_user_id(), 'posts_per_page' => -1, 'fields' => 'ids'));
                    $last_30_days_views = array();

                    for ($i = 29; $i >= 0; $i--) {
                        $date = date('Y-m-d', strtotime("-$i days"));
                        $count = $wpdb->get_var($wpdb->prepare(
                                "SELECT COUNT(*) FROM {$wpdb->prefix}property_analytics WHERE event_type = 'page_view' AND DATE(created_at) = %s AND property_id IN (" . implode(',', $properties ?: array(0)) . ")",
                                $date
                        ));
                        $last_30_days_views[date('M d', strtotime($date))] = intval($count);
                    }
                    echo json_encode($last_30_days_views);
                    ?>;

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: Object.keys(analyticsData),
                    datasets: [{
                        label: 'Property Views',
                        data: Object.values(analyticsData),
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointBackgroundColor: '#2563eb',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: true,
                            labels: { color: '#475569', font: { weight: 'bold' } }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: '#e2e8f0' },
                            ticks: { color: '#64748b' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: '#64748b' }
                        }
                    }
                }
            });
        }
    });

    let stripe, upgradeCardElement, updateCardElement;

    document.addEventListener('DOMContentLoaded', function () {
        const publishableKey = 'pk_test_51S1WzxB1fVG7OgbP1M3aDl9FmKiPor8xJT1vtqgAj33mY37UK75L0oMgSMaQswkQyjpyW9daLLpmWfK5HGjSN49e00VY6HZueY';
        stripe = Stripe(publishableKey);

        const elements = stripe.elements();
        upgradeCardElement = elements.create('card');
        const updateElements = stripe.elements();
        updateCardElement = updateElements.create('card');

        upgradeCardElement.on('change', function (event) {
            const displayError = document.getElementById('upgrade-card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        updateCardElement.on('change', function (event) {
            const displayError = document.getElementById('update-card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    });
</script>

<?php get_footer(); ?>
