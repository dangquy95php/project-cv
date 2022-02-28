=== SP Auto TEL LINK ===
Contributors: @yamaguchieiji
Donate link: none
Tags: smartphone, tellink, iOS, iPhone, Android
Requires at least: 3.3
Tested up to: 4.9
Stable tag: 1.1

Only for smartphones This is a WordPress plugin for enabling TEL link.

== Description ==

Only for smartphones This is a WordPress plugin for enabling TEL link (telto :).

With plugin installed & enabled, telto is automatically added by wrapping elements with "tel_link" class attribute for smartphones (iOS, Android).

User Agent confirms the authenticity of the smartphone.

== Installation ==

1. Upload `sp-auto-tellink` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'SP Auto TEL LINK' menu in WordPress
3. Place `<p class="tel_link">03-1234-5678</p>` in your pages or posts

== Frequently Asked Questions ==

= Does it correspond to the ID attribute? =

No. Only the class attribute is the target.

= Does the phone number correspond to images? =

Yes. Please set the alt attribute of the image to a telephone number and attach the `.tel_link` class attribute to the parent tag in a wrapped form.
ex) <p class="tel_link"><img scr="..." alt="03-1234-5678" /></p>

= Do you support international numbers such as + 81? =

Yes. It corresponds.
ex) <p class="tel_link">+81-3-1234-5678</p>

== Changelog ==

= 1.1 =

Add event tracking for Conversions for Google Analytics

= 1.0 =

Plugin development

== Screenshots ==

== License ==

== Translations ==

