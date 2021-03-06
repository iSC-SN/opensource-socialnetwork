<?php
/**
 * Open Source Social Network
 *
 * @package   (softlab24.com).ossn
 * @author    OSSN Core Team <info@softlab24.com>
 * @copyright 2014-2016 SOFTLAB24 LIMITED
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
$user = input('email');
if (empty($user)) {
    ossn_trigger_message(ossn_print('password:reset:email:required'), 'error');
    redirect(REF);
}
$user = ossn_user_by_email($user);
if ($user && $user->SendResetLogin()) {
    ossn_trigger_message(ossn_print('passord:reset:email:success'), 'success');
    redirect();
} else {
    ossn_trigger_message(ossn_print('passord:reset:fail'), 'error');
    redirect(REF);
}