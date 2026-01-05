<?php

/**
 * Template Name: Transactional Email Services
 * Description: Custom page template to display Transactional Email Services.
 */

get_header();
?>
<!-- Slick Carousel CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<div class="transactional-email-container">

  <div class="page-content">
    <?php the_content(); ?>
  </div>

  <!-- Pricing Plans Section -->
  <div class="pricing-plans-section" style="max-width: 1200px; margin: 40px auto; padding: 20px;">
    <!-- Plan Type Tabs -->
    <div class="plan-tabs" style="text-align: center; margin-bottom: 30px;">
      <button class="tab-btn active" data-plan="monthly" style="background: #3498db; color: white; padding: 12px 40px; border: none; border-radius: 5px 5px 0 0; font-size: 16px; cursor: pointer; margin-right: 5px;">
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
            I want to send <span id="email-count-display" style="color: #3498db; font-weight: bold;">10,000</span> emails/month
          </label>
          <input type="range" id="email-volume-slider" min="0" max="7" step="1" value="0" style="width: 100%; height: 8px; border-radius: 5px; background: #34495e; outline: none; cursor: pointer;">
          <div style="display: flex; justify-content: space-between; margin-top: 10px; color: #95a5a6; font-size: 12px;">
            <span>10K</span>
            <span>25K</span>
            <span>50K</span>
            <span>100K</span>
            <span>250K</span>
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
      <div style="background: #e8f4f8; padding: 20px; text-align: center; margin-bottom: 30px; border-radius: 8px;">
        <h2 style="font-size: 28px; margin: 0 0 10px 0; font-weight: bold; color: #2c3e50;">Monthly Transactional Email Plans</h2>
        <p style="margin: 0; color: #555; font-size: 16px;">
          <strong>Monthly Plans</strong> offer reliable transactional email delivery for businesses that need to send order confirmations, password resets, notifications, and more.
        </p>
      </div>

      <div class="pricing-carousel">
        <!-- Pay As You Go Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 15px 0; color: #333;">Features</h3>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Email Credits</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">API Access</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">SMTP Support</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Delivery Reports</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">99.9% Uptime</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">24/7 Support</div>
          </div>
        </div>

        <!-- T10K Plan -->
        <div class="pricing-card" data-emails="10000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T10K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹1900</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Month</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">10,000</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #3498db; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T25K Plan -->
        <div class="pricing-card" data-emails="25000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T25K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹3900</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Month</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">25,000</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #3498db; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T50K Plan -->
        <div class="pricing-card" data-emails="50000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T50K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹6900</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Month</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">50,000</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #3498db; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T100K Plan -->
        <div class="pricing-card" data-emails="100000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T100K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹11900</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Month</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">100,000</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #3498db; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T250K Plan -->
        <div class="pricing-card" data-emails="250000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T250K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹24900</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Month</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">250,000</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #3498db; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T500K Plan -->
        <div class="pricing-card" data-emails="500000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T500K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹44900</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Month</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">500,000</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #3498db; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>
      </div>
    </div>

    <!-- Yearly Plans Content (Hidden by default) -->
    <div class="plans-content" id="yearly-plans">
      <div style="background: #e8f4f8; padding: 20px; text-align: center; margin-bottom: 30px; border-radius: 8px;">
        <h2 style="font-size: 28px; margin: 0 0 10px 0; font-weight: bold; color: #2c3e50;">Yearly Transactional Email Plans</h2>
        <p style="margin: 0; color: #555; font-size: 16px;">
          <strong>Yearly Plans</strong> offer the best value with up to 20% savings. Perfect for businesses with consistent transactional email needs.
        </p>
      </div>

      <div class="pricing-carousel">
        <!-- Pay As You Go Plan -->
        <div class="pricing-card" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 15px 0; color: #333;">Features</h3>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Email Credits</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">API Access</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">SMTP Support</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Delivery Reports</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">99.9% Uptime</div>
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">24/7 Support</div>
          </div>
        </div>

        <!-- T10K Yearly Plan -->
        <div class="pricing-card" data-emails="10000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <div style="background: #27ae60; color: white; padding: 5px; font-size: 12px; font-weight: bold; margin: -20px -20px 10px -20px; border-radius: 6px 6px 0 0;">SAVE 15%</div>
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T10K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹19500</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Year</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">10,000/mo</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #27ae60; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T25K Yearly Plan -->
        <div class="pricing-card" data-emails="25000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <div style="background: #27ae60; color: white; padding: 5px; font-size: 12px; font-weight: bold; margin: -20px -20px 10px -20px; border-radius: 6px 6px 0 0;">SAVE 15%</div>
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T25K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹39900</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Year</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">25,000/mo</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #27ae60; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T50K Yearly Plan -->
        <div class="pricing-card" data-emails="50000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <div style="background: #27ae60; color: white; padding: 5px; font-size: 12px; font-weight: bold; margin: -20px -20px 10px -20px; border-radius: 6px 6px 0 0;">SAVE 15%</div>
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T50K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹70500</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Year</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">50,000/mo</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #27ae60; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T100K Yearly Plan -->
        <div class="pricing-card" data-emails="100000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <div style="background: #27ae60; color: white; padding: 5px; font-size: 12px; font-weight: bold; margin: -20px -20px 10px -20px; border-radius: 6px 6px 0 0;">SAVE 15%</div>
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T100K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹121500</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Year</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">100,000/mo</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #27ae60; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T250K Yearly Plan -->
        <div class="pricing-card" data-emails="250000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <div style="background: #f39c12; color: white; padding: 5px; font-size: 12px; font-weight: bold; margin: -20px -20px 10px -20px; border-radius: 6px 6px 0 0;">SAVE 20%</div>
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T250K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹239000</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Year</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">250,000/mo</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #f39c12; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T500K Yearly Plan -->
        <div class="pricing-card" data-emails="500000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <div style="background: #f39c12; color: white; padding: 5px; font-size: 12px; font-weight: bold; margin: -20px -20px 10px -20px; border-radius: 6px 6px 0 0;">SAVE 20%</div>
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T500K</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹431000</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Year</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">500,000/mo</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #f39c12; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T1M Yearly Plan -->
        <div class="pricing-card" data-emails="1000000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <div style="background: #f39c12; color: white; padding: 5px; font-size: 12px; font-weight: bold; margin: -20px -20px 10px -20px; border-radius: 6px 6px 0 0;">SAVE 20%</div>
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T1M</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹767000</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Year</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">1,000,000/mo</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #f39c12; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>

        <!-- T2M Yearly Plan -->
        <div class="pricing-card" data-emails="2000000" style="background: white; border: 2px solid #ddd; border-radius: 8px; padding: 20px; text-align: center; min-width: 150px;">
          <div style="background: #f39c12; color: white; padding: 5px; font-size: 12px; font-weight: bold; margin: -20px -20px 10px -20px; border-radius: 6px 6px 0 0;">SAVE 20%</div>
          <h3 style="font-size: 18px; font-weight: bold; margin: 0 0 10px 0; color: #333;">T2M</h3>
          <div class="price" style="font-size: 32px; font-weight: bold; color: #000; margin: 10px 0;">₹1343000</div>
          <div style="color: #3498db; font-size: 14px; font-weight: bold; margin-bottom: 15px;">Per Year</div>
          <div style="margin: 15px 0;">
            <div style="font-size: 14px; color: #333; margin-bottom: 10px; font-weight: 600;">2,000,000/mo</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
            <div style="color: #27ae60; margin-bottom: 10px;">✓</div>
          </div>
          <button class="sign-up-btn" style="background: #f39c12; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; width: 100%; font-weight: bold;">
            Sign Up
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Key Features Section -->
  <div class="key-features-section" style="max-width: 1200px; margin: 60px auto; padding: 20px;">
    <h2 style="text-align: center; font-size: 32px; margin-bottom: 40px; color: #2c3e50;">Why Choose Our Transactional Email Service?</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
      <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
        <div style="font-size: 48px; color: #3498db; margin-bottom: 15px;">⚡</div>
        <h3 style="color: #2c3e50; margin-bottom: 10px;">Lightning Fast Delivery</h3>
        <p style="color: #555; line-height: 1.6;">Average delivery time under 1 second with our optimized infrastructure.</p>
      </div>
      <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
        <div style="font-size: 48px; color: #27ae60; margin-bottom: 15px;">✓</div>
        <h3 style="color: #2c3e50; margin-bottom: 10px;">99.9% Uptime SLA</h3>
        <p style="color: #555; line-height: 1.6;">Industry-leading reliability ensures your emails reach customers when it matters.</p>
      </div>
      <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
        <div style="font-size: 48px; color: #e74c3c; margin-bottom: 15px;">🔒</div>
        <h3 style="color: #2c3e50; margin-bottom: 10px;">Enterprise Security</h3>
        <p style="color: #555; line-height: 1.6;">TLS encryption, DKIM, SPF, and DMARC authentication included.</p>
      </div>
      <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
        <div style="font-size: 48px; color: #f39c12; margin-bottom: 15px;">📊</div>
        <h3 style="color: #2c3e50; margin-bottom: 10px;">Real-Time Analytics</h3>
        <p style="color: #555; line-height: 1.6;">Track opens, clicks, bounces, and complaints with detailed reports.</p>
      </div>
    </div>
  </div>

</div>

<!-- Alert Modal -->
<div id="alert-modal" class="modal" style="display: none;">
  <div class="modal-overlay"></div>
  <div class="modal-content">
    <div class="modal-header">
      <h3 id="modal-title">Alert</h3>
      <span class="modal-close">&times;</span>
    </div>
    <div class="modal-body">
      <p id="modal-message"></p>
    </div>
    <div class="modal-footer">
      <button id="modal-ok-btn" class="modal-btn">OK</button>
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
    background: #3498db !important;
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

  .pricing-grid {
    display: grid;
    gap: 15px;
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
    border-color: #3498db !important;
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
    opacity: 0.9;
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
    background: #3498db;
  }

  .slick-prev:focus,
  .slick-next:focus {
    background: #333;
  }

  .slick-prev:hover:focus,
  .slick-next:hover:focus {
    background: #3498db;
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
    background: #3498db;
    cursor: pointer;
    border-radius: 50%;
    border: 3px solid white;
  }

  #email-volume-slider::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: #3498db;
    cursor: pointer;
    border-radius: 50%;
    border: 3px solid white;
  }

  #email-volume-slider::-webkit-slider-runnable-track {
    background: linear-gradient(to right, #3498db 0%, #3498db var(--slider-progress, 0%), #34495e var(--slider-progress, 0%), #34495e 100%);
    height: 8px;
    border-radius: 5px;
  }

  #email-volume-slider::-moz-range-track {
    background: #34495e;
    height: 8px;
    border-radius: 5px;
  }

  #email-volume-slider::-moz-range-progress {
    background: #3498db;
    height: 8px;
    border-radius: 5px;
  }

  #currency-selector {
    transition: border-color 0.3s ease;
  }

  #currency-selector:hover {
    border-color: #3498db;
  }

  /* Responsive Carousel */
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
    background: #3498db;
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
    background: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
  }

  .modal-btn:hover {
    background: #2980b9;
  }
</style>

<script>
  jQuery(document).ready(function ($) {
    // Email volume levels and pricing data
    const emailVolumes = [
      { value: 0, emails: 10000, label: '10,000' },
      { value: 1, emails: 25000, label: '25,000' },
      { value: 2, emails: 50000, label: '50,000' },
      { value: 3, emails: 100000, label: '100,000' },
      { value: 4, emails: 250000, label: '250,000' },
      { value: 5, emails: 500000, label: '500,000' },
      { value: 6, emails: 1000000, label: '1,000,000' },
      { value: 7, emails: 2000000, label: '2,000,000' }
    ];

    const pricingData = {
      monthly: {
        10000: { priceINR: 1900, priceUSD: 23 },
        25000: { priceINR: 3900, priceUSD: 47 },
        50000: { priceINR: 6900, priceUSD: 82 },
        100000: { priceINR: 11900, priceUSD: 142 },
        250000: { priceINR: 24900, priceUSD: 298 },
        500000: { priceINR: 44900, priceUSD: 537 },
        1000000: { priceINR: 79900, priceUSD: 955 },
        2000000: { priceINR: 139900, priceUSD: 1673 }
      },
      yearly: {
        10000: { priceINR: 19500, priceUSD: 233 },
        25000: { priceINR: 39900, priceUSD: 477 },
        50000: { priceINR: 70500, priceUSD: 842 },
        100000: { priceINR: 121500, priceUSD: 1452 },
        250000: { priceINR: 239000, priceUSD: 2857 },
        500000: { priceINR: 431000, priceUSD: 5154 },
        1000000: { priceINR: 767000, priceUSD: 9168 },
        2000000: { priceINR: 1343000, priceUSD: 16056 }
      }
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
      $('.pricing-card[data-emails]').each(function () {
        const planEmails = parseInt($(this).data('emails'));
        
        if (planEmails === volumeData.emails) {
          $(this).addClass('highlighted');
        }
      });
    }

    function updatePrices() {
      const currency = $('#currency-selector').val();
      const symbol = currency === 'INR' ? '₹' : '$';
      const activePlan = $('.plans-content.active').attr('id');
      const planType = activePlan === 'monthly-plans' ? 'monthly' : 'yearly';
      
      $('.pricing-card[data-emails]').each(function () {
        const planEmails = parseInt($(this).data('emails'));
        const planData = pricingData[planType][planEmails];
        
        if (planData) {
          const price = currency === 'INR' ? planData.priceINR : planData.priceUSD;
          $(this).find('.price').text(symbol + price.toLocaleString());
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
      
      // Re-highlight matching plan and update prices
      highlightMatchingPlan();
      updatePrices();
    });

    // Sign up button click handler
    $(document).on('click', '.sign-up-btn', function (e) {
      e.preventDefault();
      const planName = $(this).closest('.pricing-card').find('h3').text();
      const price = $(this).closest('.pricing-card').find('.price').text();

      <?php if (!is_user_logged_in()): ?>
        showAlertModal('Login Required', 'You need to login first to sign up for ' + planName + ' plan.');
      <?php else: ?>
        showAlertModal('Sign Up', 'You are signing up for ' + planName + ' plan at ' + price + '. Our team will contact you shortly.');
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
