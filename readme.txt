=== Offerte Gas Luce ===
Contributors: GioSensation
Tags: Offerte Gas e Luce, Bollette Energia
Author URI: https://offertegasluce.com
Plugin URI: https://offertegasluce.com
Requires at least: 4.7
Tested up to: 6.1
Stable tag: 1.0.6
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds a widget with up-to-date information about utility energy providers in Italy taken from offertegasluce.com. No subscription required. Optional attribution links.

== Description ==
Adds a widget with up-to-date information about current utility energy providers in Italy taken from the site [Offerte Gas e Luce](https://offertegasluce.com "Risparmia sulle bollette di gas e luce • Offerte Gas e Luce") using the WordPress rest API. No subscription required. Optional attribution links.

You just add the widget to the site and it will display up-to-date information about the number of offers you decide. We will add estimated monthly costs in a later update.

Great if you have a related website, or a real estate website that wants to provide additional information for home-related services like **gas and electric energy**. Any home or business-oriented website can use this to add value for their customers.

Attribution is optional, but welcome. You can enable it in the widget control panel.

Enjoy!

----

Aggiunge una widget con informazioni sempre aggiornate sui contratti per le bollette dell'energia di luce e gas in Italia, prese dal sito [Offerte Gas e Luce](https://offertegasluce.com "Risparmia sulle bollette di gas e luce • Offerte Gas e Luce") tramite la API di WordPress. Nessuna sottoscrizione, né obbligo di backlink.

Ti basta aggiungere la widget e le informazioni verranno mostrate sul tuo sito. Aggiungeremo il costo delle bollette mensile in un prossimo aggiornamento.

Il plugin è utile per siti correlati, o per siti di immobiliare per mostrare servizi per la casa come appunto le **offerte luce e gas**. I siti che offrono servizi di questo tipo possono usare la widget per fornire un valore aggiunto ai propri utenti.

Il link di attribuzione è opzionale, ma benvenuto. È possibile abilitarlo dal pannello di controllo della widget.

Enjoy!

= Tech details =
The **Offerte Gas e Luce** plugin comes with a simple stylesheet that makes sure the information looks good by default. You can override the styles through your own stylesheet.

= Issues & support =
If you see something that's not quite right you can contact me on [Twitter](https://twitter.com/Offerteinternet "Offerte Internet – L'ADSL su Twitter") or [Facebook](https://www.facebook.com/offerteinternet/ "Offerte Internet – L'ADSL su Facebook"). I'll be happy to help with more functionalities and fixes.

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/offerte-gas-luce` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Add the widget to your WordPress in Appearance > Widgets
1. Go with the defaults or configure it to your heart's content: you can decide how many offers to show (up to 15), the intro text, and whether or not to include links to the offer review on [offertegasluce.com](https://offertegasluce.com "Risparmia sulle bollette di gas e luce • Offerte Gas e Luce")
1. Enjoy


== Frequently Asked Questions ==

= Am I required to include attribution links to your website? =

Not at all. You can opt in to include links to original reviews in the widgets config page under Appearance > Widgets.

= Do you provide updated information? =

Yes, the widget uses the WordPress rest API to retrieve the information daily and I will do my best to keep the info on [offertegasluce.com](https://offertegasluce.com "Risparmia sulle bollette di gas e luce • Offerte Gas e Luce") updated with all the current offers.

== Screenshots ==
1. The UI of the widget config page under Appearance > Widgets
2. How it shows on the front-end

== Changelog ==

= 1.0.6 =
Fix unhandled error when the remote call doesn't error but it's not 200 (i.e. 404).

= 1.0.4 =
Use rel="noopener" on links.

= 1.0.3 =
Minor fixes.

= 1.0.2 =
Use a proxy to the API to ensure maximum availability.

= 1.0.1 =
Add namespace to log_error function to avoid possible conflicts. 🤦‍♂️

= 1.0.0 =
Initial release. Wooo!

== Upgrade Notice ==
Use rel="noopener" on links.
