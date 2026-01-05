<?php

/**
 * Template Name: Promotion Email Services
 * Description: Custom page template to display Promotion Email Services.
 */

get_header();
?>
<!-- Slick Carousel CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<div class="promotion-email-container">

  <div class="page-content">
    <?php the_content(); ?>
  </div>

  <!-- Pricing Plans Section -->
  <div class="pricing-plans-section" style="max-width: 1200px; margin: 40px auto; padding: 20px;">
    <!-- Plan Type Tabs -->
    <div class="plan-tabs" style="text-align: center; margin-bottom: 30px;">
      <button class="tab-btn active" data-plan="monthly" style="background: #5cb85c; color: white; padding: 12px 40px; border: none; border-radius: 5px 5px 0 0; font-size: 16px; cursor: pointer; margin-right: 5px;">
        Monthly Plans
      </button>
      <button class="tab-btn" data-plan="yearly" style="background: #e0e0e0; color: #666; padding: 12px 40px; border: none; border-radius: 5px 5px 0 0; font-size: 16px; cursor: pointer;">
        Yearly Plans
      </button>
    </div>

    <!-- Email Volume Slider Filter -->
    <div class="email-volume-filter" style="background: #2c3e50; padding: 30px; margin-bottom: 30px; border-radius: 8px;">
      <div style="display: flex; justify-content: space-between; align-items: center; max-width: 900px; margin: 0 auto;">
        <div style="flex: 1;">
          <label style="color: white; font-size: 18px; display: block; margin-bottom: 15px;">
            I want to send <span id="email-count-display" style="color: #e74c3c; font-weight: bold;">50,000</span> emails/month
          </label>
          <input type="range" id="email-volume-slider" min="0" max="6" step="1" value="0" style="width: 100%; height: 8px; border-radius: 5px; background: #34495e; outline: none; cursor: pointer;">
          <div style="display: flex; justify-content: space-between; margin-top: 10px; color: #95a5a6; font-size: 12px;">
            <span>30K</span>
            <span>100K</span>
            <span>200K</span>
            <span>300K</span>
            <span>500K</span>
            <span>1M</span>
            <span>2M</span>
          </div>
        </div>
        <div style="margin-left: 40px; min-width: 120px;">
          <select id="currency-selector" style="background: white; border: 2px solid #34495e; padding: 10px 15px; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;">
            <option value="INR">₹ INR</option>
            <option value="USD">$ USD</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Monthly Plans Content -->
    <div class="plans-content active" id="monthly-plans">
      <div style="background: #e0e0e0; padding: 20px; text-align: center; margin-bottom: 30px;">
        <h2 style="font-size: 28px; margin: 0 0 10px 0; font-weight: bold;">Monthly Plans</h2>
        <p style="margin: 0; color: #666; font-size: 16px;">
          <strong>Monthly Plans</strong> offer affordable bulk email marketing for businesses that expects to send bulk emails regularly every month.
        </p>
      </div>

      <div class="pricing-carousel">
        <!-- Pay As You Go Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 15px 0; color: #333;">Pay-As-You-Go</h3>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Email Credits</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Unlimited Contacts</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Intelligent Engine</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Real-Time Reports</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">IP Monitoring</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Phone Support</div>
          </div>
        </div>

        <!-- P30K Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">P30K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹2900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">30,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- P100K Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">P100K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹5900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">100,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- P200K Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">P200K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹8900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">300,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- P500K Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">P500K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹17900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">500,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- 1 Million Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">1 Million</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹29900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">1,000,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- 2 Million Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">2 Million</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹49900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">2,000,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>
      </div>
    </div>

    <!-- Yearly Plans Content (Hidden by default) -->
    <div class="plans-content" id="yearly-plans">
      <div style="background: #e0e0e0; padding: 20px; text-align: center; margin-bottom: 30px;">
        <h2 style="font-size: 28px; margin: 0 0 10px 0; font-weight: bold;">Yearly Plans</h2>
        <p style="margin: 0; color: #666; font-size: 16px;">
          <strong>Pay-As-You-Go</strong> are flexible. Purchase a plan when you need to send email campaigns. Unused email credits rollover from month to month.
        </p>
      </div>

      <div class="pricing-carousel">
        <!-- Pay As You Go Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 15px 0; color: #333;">Pay-As-You-Go</h3>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Email Credits</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Unlimited Contacts</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Intelligent Engine</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Real-Time Reports</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">IP Monitoring</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Phone Support</div>
          </div>
        </div>

        <!-- P30K Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">P30K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹2900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">30,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- P100K Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">P100K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹5900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">100,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- P200K Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">P200K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹8900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">300,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- P500K Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">P500K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹17900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">500,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- 1 Million Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">1 Million</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹29900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">1,000,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- 2 Million Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">2 Million</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹49900</div>
          <div style="color: #c0392b; font-size: 14px; font-weight: bold; margin-bottom: 15px;">One Time</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">2,000,000</div>
            <div style="font-size: 14px; color: #333; margin-bottom: 10px;">30 Days</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
            <div style="color: #e74c3c; margin-bottom: 10px;">⭐</div>
          </div>
          <button class="sign-up-btn" style="background: #ff0000; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>
      </div>
    </div>
  </div>

<style>
  /* Pricing Plans Styles */
  .pricing-plans-section {
    margin-bottom: 40px;
  }

  .plan-tabs {
    display: flex;
    justify-content: center;
    gap: 5px;
  }

  .tab-btn {
    transition: all 0.3s ease;
  }

  .tab-btn.active {
    background: #5cb85c !important;
    color: white !important;
  }

  .tab-btn:not(.active):hover {
    background: #c0c0c0;
  }

  .plans-content {
    display: none;
  }

  .plans-content.active {
    display: block;
  }

  /* Carousel Container */
  .pricing-carousel {
    position: relative;
    padding: 0 70px;
    margin: 20px 0;
    height: 450px;
  }

  /* Pricing Cards */
  .pricing-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    opacity: 0.6;
    height: 450px !important;
    display: flex !important;
    flex-direction: column;
    justify-content: space-between;
    margin: 0 10px !important;
    padding: 20px !important;
  }

  .pricing-card > * {
    flex-shrink: 0;
  }

  .pricing-card h3 {
    margin-bottom: 10px !important;
  }

  .pricing-card .price {
    margin: 10px 0 !important;
  }

  .pricing-card.highlighted {
    opacity: 1;
    border-color: #e74c3c !important;
    border-width: 3px !important;
  }

  .pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    opacity: 1;
  }

  .sign-up-btn {
    transition: background 0.3s ease;
    margin-top: auto;
  }

  .sign-up-btn:hover {
    background: #cc0000 !important;
  }

  /* Slick Arrows */
  .slick-prev,
  .slick-next {
    width: 50px;
    height: 50px;
    z-index: 100;
    background: #333;
    border-radius: 50%;
    font-size: 0;
    top: 50%;
    transform: translateY(-50%);
  }

  .slick-prev:before,
  .slick-next:before {
    font-size: 24px;
    color: white;
    opacity: 1;
    line-height: 1;
  }

  .slick-prev {
    left: 10px;
  }

  .slick-next {
    right: 10px;
  }

  .slick-prev:hover,
  .slick-next:hover {
    background: #e74c3c;
  }

  .slick-prev:focus,
  .slick-next:focus {
    background: #333;
  }

  .slick-prev:hover:focus,
  .slick-next:hover:focus {
    background: #e74c3c;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .pricing-carousel {
      padding: 0 40px;
    }

    .slick-prev,
    .slick-next {
      width: 35px;
      height: 35px;
    }

    .slick-prev:before,
    .slick-next:before {
      font-size: 18px;
    }
  }

  /* Email Volume Filter Styles */
  .email-volume-filter {
    position: relative;
  }

  #email-volume-slider {
    -webkit-appearance: none;
    appearance: none;
  }

  #email-volume-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    background: #e74c3c;
    cursor: pointer;
    border-radius: 50%;
    border: 3px solid white;
  }

  #email-volume-slider::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: #e74c3c;
    cursor: pointer;
    border-radius: 50%;
    border: 3px solid white;
  }

  #email-volume-slider::-webkit-slider-runnable-track {
    background: linear-gradient(to right, #e74c3c 0%, #e74c3c var(--slider-progress, 0%), #34495e var(--slider-progress, 0%), #34495e 100%);
    height: 8px;
    border-radius: 5px;
  }

  #email-volume-slider::-moz-range-track {
    background: #34495e;
    height: 8px;
    border-radius: 5px;
  }

  #email-volume-slider::-moz-range-progress {
    background: #e74c3c;
    height: 8px;
    border-radius: 5px;
  }

  #currency-selector {
    transition: border-color 0.3s ease;
  }

  #currency-selector:hover {
    border-color: #e74c3c;
  }

  /* Responsive Pricing Grid */
  @media (max-width: 1400px) {
    .pricing-grid {
      grid-template-columns: repeat(4, 1fr);
    }
  }

  @media (max-width: 1024px) {
    .pricing-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  @media (max-width: 768px) {
    .pricing-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    .plan-tabs {
      flex-direction: column;
      align-items: center;
    }

    .tab-btn {
      width: 100%;
      max-width: 300px;
      border-radius: 5px !important;
      margin-bottom: 5px;
    }
  }

  @media (max-width: 480px) {
    .pricing-grid {
      grid-template-columns: 1fr;
    }

    .pricing-card {
      min-width: auto;
    }
  }

  /* Modal Styles */
  .modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10000;
  }

  .modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
  }

  .modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    max-width: 400px;
    width: 90%;
    max-height: 80vh;
    overflow: hidden;
  }

  .modal-header {
    background: #ff5555;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .modal-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
  }

  .modal-close {
    font-size: 24px;
    cursor: pointer;
    line-height: 1;
    padding: 0 5px;
  }

  .modal-close:hover {
    opacity: 0.7;
  }

  .modal-body {
    padding: 20px;
  }

  .modal-body p {
    margin: 0;
    font-size: 16px;
    line-height: 1.5;
    color: #333;
  }

  .modal-footer {
    padding: 15px 20px;
    text-align: right;
    border-top: 1px solid #eee;
  }

  .modal-btn {
    background: #ff5555;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
  }

  .modal-btn:hover {
    background: #e74c3c;
  }

  /* Search Styles */
  .search-input-wrapper input:focus {
    border-color: #ff5555;
  }

  #promotion-search-btn:hover {
    background: #555;
  }

  #search-autocomplete {
    position: relative;
  }

  .autocomplete-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 80px;
    background: white;
    border: 1px solid #ddd;
    border-top: none;
    max-height: 200px;
    overflow-y: auto;
    z-index: 1000;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .autocomplete-item {
    padding: 10px 15px;
    cursor: pointer;
    border-bottom: 1px solid #eee;
  }

  .autocomplete-item:hover {
    background: #f5f5f5;
  }

  .autocomplete-item:last-child {
    border-bottom: none;
  }

  #promotion-services-table tbody tr {
    border-bottom: 1px solid #ddd;
  }

  #promotion-services-table tbody tr:nth-child(even) {
    background: #f9f9f9;
  }

  #promotion-services-table tbody td {
    padding: 12px 15px;
  }

  .inquiry-btn {
    background: #ff5555;
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin-right: 8px;
  }

  .inquiry-btn:hover {
    background: #e74c3c;
    color: white;
    text-decoration: none;
  }

  .view-details-btn {
    background: #3498db;
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
  }

  .view-details-btn:hover {
    background: #2980b9;
    color: white;
    text-decoration: none;
  }
</style>

<script>
  jQuery(document).ready(function ($) {
    let searchTimeout;

    // Email volume levels and pricing data
    const emailVolumes = [
      { value: 0, emails: 30000, label: '30,000' },
      { value: 1, emails: 100000, label: '100,000' },
      { value: 2, emails: 200000, label: '200,000' },
      { value: 3, emails: 300000, label: '300,000' },
      { value: 4, emails: 500000, label: '500,000' },
      { value: 5, emails: 1000000, label: '1,000,000' },
      { value: 6, emails: 2000000, label: '2,000,000' }
    ];

    const pricingData = {
      'P30K': { emails: 30000, priceINR: 2900, priceUSD: 35 },
      'P100K': { emails: 100000, priceINR: 5900, priceUSD: 70 },
      'P200K': { emails: 300000, priceINR: 8900, priceUSD: 105 },
      'P500K': { emails: 500000, priceINR: 17900, priceUSD: 210 },
      '1 Million': { emails: 1000000, priceINR: 29900, priceUSD: 350 },
      '2 Million': { emails: 2000000, priceINR: 49900, priceUSD: 585 }
    };

    // Initialize slider
    updateSliderProgress();
    highlightMatchingPlan();

    // Email volume slider functionality
    $('#email-volume-slider').on('input', function () {
      const sliderValue = parseInt($(this).val());
      const volumeData = emailVolumes[sliderValue];
      $('#email-count-display').text(volumeData.label);
      updateSliderProgress();
      highlightMatchingPlan();
    });

    // Currency selector functionality
    $('#currency-selector').on('change', function () {
      updatePrices();
    });

    function updateSliderProgress() {
      const slider = document.getElementById('email-volume-slider');
      const value = slider.value;
      const max = slider.max;
      const percentage = (value / max) * 100;
      slider.style.setProperty('--slider-progress', percentage + '%');
    }

    function highlightMatchingPlan() {
      const sliderValue = parseInt($('#email-volume-slider').val());
      const volumeData = emailVolumes[sliderValue];
      
      // Remove all highlights
      $('.pricing-card').removeClass('highlighted');
      
      // Find and highlight matching plan
      $('.pricing-card').each(function () {
        const planTitle = $(this).find('h3').text().trim();
        const planData = pricingData[planTitle];
        
        if (planData && planData.emails === volumeData.emails) {
          $(this).addClass('highlighted');
        }
      });
    }

    function updatePrices() {
      const currency = $('#currency-selector').val();
      const symbol = currency === 'INR' ? '₹' : '$';
      
      $('.pricing-card').each(function () {
        const planTitle = $(this).find('h3').text().trim();
        const planData = pricingData[planTitle];
        
        if (planData) {
          const price = currency === 'INR' ? planData.priceINR : planData.priceUSD;
          $(this).find('.price').text(symbol + price);
        }
      });
    }

    // Tab switching functionality
    $('.tab-btn').click(function () {
      const planType = $(this).data('plan');

      // Update active tab
      $('.tab-btn').removeClass('active');
      $(this).addClass('active');

      // Show corresponding content
      $('.plans-content').removeClass('active');
      $('#' + planType + '-plans').addClass('active');
      
      // Re-highlight matching plan
      highlightMatchingPlan();
    });

    // Sign up button click handler
    $(document).on('click', '.sign-up-btn', function (e) {
      e.preventDefault();
      const planName = $(this).closest('.pricing-card').find('h3').text();
      const price = $(this).closest('.pricing-card').find('.price').text();

      <?php if (!is_user_logged_in()): ?>
        showAlertModal('Login Required', 'You need to login first to sign up for ' + planName + '.');
      <?php else: ?>
        showAlertModal('Sign Up', 'You are signing up for ' + planName + ' at ' + price + '. Our team will contact you shortly.');
        // Here you can add AJAX call to process the signup
      <?php endif; ?>
    });

    // Modal functions
    function showAlertModal(title, message) {
      $('#modal-title').text(title);
      $('#modal-message').text(message);
      $('#alert-modal').fadeIn(300);
    }

    function hideAlertModal() {
      $('#alert-modal').fadeOut(300);
    }

    // Modal event handlers
    $('.modal-close, #modal-ok-btn, .modal-overlay').click(function () {
      hideAlertModal();
    });

    // Prevent modal content clicks from closing modal
    $('.modal-content').click(function (e) {
      e.stopPropagation();
    });

    // ESC key to close modal
    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        hideAlertModal();
      }
    });

    // Search input autocomplete
    $('#promotion-search-input').on('input', function () {
      const query = $(this).val().trim();

      clearTimeout(searchTimeout);

      if (query.length >= 2) {
        searchTimeout = setTimeout(function () {
          getAutocomplete(query);
        }, 300);
      } else {
        $('#search-autocomplete .autocomplete-dropdown').remove();
      }
    });

    // Search button click
    $('#promotion-search-btn').click(function () {
      const query = $('#promotion-search-input').val().trim();
      const normalizedQuery = query
        .replace(/&#8211;|&#8212;|\u2013|\u2014/g, ' - ')
        .replace(/\s*-+\s*/g, ' - ');
      searchPromotionServices(normalizedQuery);
      $('#promotion-results-container').show();
    });

    // Enter key search
    $('#promotion-search-input').keypress(function (e) {
      if (e.which == 13) {
        $('#promotion-search-btn').click();
      }
    });

    function getAutocomplete(query) {
      $.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'POST',
        data: {
          action: 'get_promotion_autocomplete',
          query: query,
          nonce: '<?php echo wp_create_nonce('promotion_autocomplete_nonce'); ?>'
        },
        success: function (response) {
          if (response.success) {
            showAutocomplete(response.data);
          }
        }
      });
    }

    function showAutocomplete(items) {
      $('#search-autocomplete .autocomplete-dropdown').remove();

      if (items.length > 0) {
        let dropdown = $('<div class="autocomplete-dropdown"></div>');

        items.forEach(function (item) {
          let autocompleteItem = $('<div class="autocomplete-item"></div>')
            .text(item.title)
            .click(function () {
              const normTitle = item.title.replace(/&#8211;|&#8212;|\u2013|\u2014/g, ' - ').replace(/\s*-+\s*/g, ' - ');
              $('#promotion-search-input').val(normTitle);
              dropdown.remove();
              searchPromotionServices(normTitle);
            });
          dropdown.append(autocompleteItem);
        });

        $('#search-autocomplete').append(dropdown);
      }
    }

    function searchPromotionServices(query = '') {
      $.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'POST',
        data: {
          action: 'search_promotion_services',
          query: query,
          nonce: '<?php echo wp_create_nonce('search_promotion_services_nonce'); ?>'
        },
        success: function (response) {
          if (response.success) {
            $('#promotion-results-body').html(response.data.html);
          }
        }
      });
    }

    // Handle inquiry clicks
    $(document).on('click', '.inquiry-btn', function (e) {
      <?php if (!is_user_logged_in()): ?>
        e.preventDefault();
        showAlertModal('Login Required', 'You need to login first to make an inquiry.');
        return false;
      <?php else: ?>
        // Handle inquiry logic here
        var serviceId = $(this).data('service-id');
        if (serviceId) {
          // You can redirect to contact form or open inquiry modal
          showAlertModal('Inquiry', 'Your inquiry has been submitted successfully.');
        }
      <?php endif; ?>
    });

    // Hide autocomplete when clicking outside
    $(document).click(function (e) {
      if (!$(e.target).closest('#search-autocomplete, #promotion-search-input').length) {
        $('#search-autocomplete .autocomplete-dropdown').remove();
      }
    });
  });
</script>
<style>
  .promotion-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin: 0 auto;
    width: 1140px;
  }

  .service-card {
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }

  .service-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .service-content {
    padding: 15px;
  }

  .service-title {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
    line-height: 1.4;
  }

  .more-details-btn {
    background: #e74c3c;
    color: white;
    padding: 8px 20px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: background 0.3s ease;
  }

  .more-details-btn:hover {
    background: #c0392b;
    color: white;
    text-decoration: none;
  }

  .load-more-btn:hover {
    background: #c0392b;
  }

  @media (max-width: 1024px) {
    .promotion-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  @media (max-width: 768px) {
    .promotion-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
    }
  }

  @media (max-width: 480px) {
    .promotion-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<script>
  jQuery(document).ready(function ($) {
    // Services grid functionality removed - using static pricing plans only
  });
</script>

<!-- Slick Carousel JS -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
jQuery(document).ready(function($) {
  // Initialize carousels
  $('.pricing-carousel').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    prevArrow: '<button type="button" class="slick-prev">❮</button>',
    nextArrow: '<button type="button" class="slick-next">❯</button>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  // Reinitialize when switching tabs
  $('.tab-btn').on('click', function() {
    setTimeout(function() {
      $('.pricing-carousel').slick('setPosition');
    }, 100);
  });
});
</script>

<?php
get_footer();
