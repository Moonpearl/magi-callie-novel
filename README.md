# Magi Callie: Online Novel

This is a project I built for a friend, who was tired of chasing readers on [Wattpad](https://www.wattpad.com), and wanted a professional page for her novel, Magi Callie (which isn't half bad, by the way, despite the silly play on words).

## Features

### Custom calendar

The author created an alternative calendar along with her universe. On the homepage, you are greeted with today's date in alternative calendar. There's a page where you can convert Gregorian dates to that alternative calendar's as well.

### Fully responsive

The page adapts to your device's screen size.

- On mobiles, only icons are displayed in the navigation bar.
- On mobiles and smaller tablets, margins in the text are reduced/removed.

### Linked to Google Docs

No need to copy/paste your chapters into a form. Just write each chapter in a Google document and enjoy the auto-update!

- Create a Google document.
- Select **publish** from the **File** menu.
- Copy the link you are given and extract your document's serial from it _(example: =https://docs.google.com/document/d/e/2PACX-**1vSLNpedNvS5wXY0E7RsU67xltaQr_C9b1B7EJq0hX6zEVVBCyfAOhqTG3EuJeXqqkfuKMRqgxgC5Fev**/pub)_.
- Insert a new row in your database's **chapters** table _(see sample query below)_.
```sql
INSERT INTO `chapters` (`id`, `title`, `serial`) VALUES
(NULL, 'My chapter\'s title', '1vSLNpedNvS5wXY0E7RsU67xltaQr_C9b1B7EJq0hX6zEVVBCyfAOhqTG3EuJeXqqkfuKMRqgxgC5Fev')
```
- Done! Your new chapter should now display correctly inside the **novel.php** page.

### Semantic markdown support

Google Docs is only meant for direct-formatting, which is a problem if we want special CSS styles certain blocks, like quotes. I designed a workaround to fix that.

- Write a _tag_ down at the start of your block.
- Insert a horizontal line (`<hr>`) at the end of your block.
- The novel.php page will remove those and apply the following effect to the block:
    - If the _tag_ is **Quote**: encase the block in a `<blockquote>` tag.
    - Any other _tags_: encase the block in a `<div class="my_class">` tag, where _my_class_ is your chosen _tag_.
> Note: _tags_ are case-insensitive.
- You can now format your document using the **chapter.css** stylesheet.
> In this example, I gave **Date** blocks some left margin and bold weight, and I gave **Main** blocks a bottom margin so the author could separate chunks of texts for ellipses.

The current version doesn't support direct-formatting made in Google Docs.

## Links

- Author's Wattpad account: https://www.wattpad.com/user/ElinorMolatFR