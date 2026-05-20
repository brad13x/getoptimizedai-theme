# GetOptimizedAI WordPress Theme

## Installation

1. Upload the `getoptimizedai-theme` folder to `/wp-content/themes/`
2. Go to **Appearance > Themes** in your WordPress admin
3. Activate **GetOptimizedAI**
4. Go to **Settings > Reading** and set your homepage to a **Static Page**
5. Create a page (any title, e.g. "Home") — the `front-page.php` template will automatically be used

## Setting Up the Nav Menu

1. Go to **Appearance > Menus**
2. Create a new menu
3. Add links: Features (`#features`), How It Works (`#how-it-works`), Pricing (`#pricing`), Contact (`#contact`)
4. Add a "Get Started" link pointing to `#contact` — then add the CSS class `nav-cta` to it (enable CSS classes under Screen Options)
5. Assign it to the **Primary Navigation** location
6. Save

## Custom Logo

Go to **Appearance > Customize > Site Identity** to upload your logo. If no logo is uploaded, the text "GetOptimizedAI" is shown by default.

## Contact Form

The CTA section is pre-wired for **Contact Form 7**. Install the plugin and create a form with the ID/slug `contact-form`. The fallback plain HTML form displays if CF7 is not active.

## Files

| File | Purpose |
|------|---------|
| `style.css` | Theme declaration + all CSS |
| `functions.php` | Theme setup, enqueue fonts/styles |
| `header.php` | Nav bar |
| `footer.php` | Footer with links |
| `front-page.php` | Full homepage (hero, features, pricing, CTA) |
| `index.php` | Fallback for other pages/posts |
