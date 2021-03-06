<?php
/**
 * Show job application when viewing a single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-application.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @version     1.16.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if ( $apply = get_the_job_application_method() ) :
	wp_enqueue_script( 'wp-job-manager-job-application' );
	?>
<div class="job_application application">
    <?php do_action( 'job_application_start', $apply ); ?>

    <?php printf( __( '<a href="mailto:%1$s%2$s" class="application_button button">Apply Now <i class="material-icons">play_arrow</i></a>', 'wp-job-manager' ), $apply->email, '?subject=' . $apply->subject ); ?>

    <div class="application_details">
        <?php
				/**
				 * job_manager_application_details_email or job_manager_application_details_url hook
				 */
				do_action( 'job_manager_application_details_' . $apply->type, $apply );
			?>
    </div>
    <?php do_action( 'job_application_end', $apply ); ?>
</div>
<?php endif; ?>