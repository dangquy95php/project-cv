<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'kmd' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', '' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Vj,%;:}x!E3NW_8[X+yltP^^~0vw:RxQUV2gXZ~nV=-8E$#sN=5=Brh [|~PI>zI' );
define( 'SECURE_AUTH_KEY',  'U[:HdYpK1.tcA5Mqn*-V/3zm76Vo*,6Q~nH(C:2[tKH?an! Ok/*m`cAN)hr/nMO' );
define( 'LOGGED_IN_KEY',    'EAHKyUQ6_Qs=3y3]=dy ZL{> :2EffJY ~du`8U`t&oAnExQ0EC!6e%His!|u.Vn' );
define( 'NONCE_KEY',        'G**lN*HoOb KH-K:Phr!FJ_W+25lK#BuCpDzB~VEAK$J*_xbvG$<701n`36hNZcK' );
define( 'AUTH_SALT',        'Qb~gb-XWdcVFe^NmTK#0+i[R:h;wN;Y}[.dS}d>jmcy`T&..?5.hFS?$F>A^OfF7' );
define( 'SECURE_AUTH_SALT', 'GtA]0)BF91PK>QDwkoXEd%uCobU`6ahIg2-qo%Dd.|4k/E{RjHMj<*O;DTZe((WF' );
define( 'LOGGED_IN_SALT',   '08x3.MzSevSQMTpMmGALjgzpq N=twxy3uTzB[!HQDk*S!hxvUQq*_i3E wv3UJs' );
define( 'NONCE_SALT',       'D`,:9w7[<r(wqP%XST.1pK],_BY[n^?@<4oEky!u#uJcXUS.NfB nd0}XBir@3:&' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define( 'WP_DEBUG', false );

/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
