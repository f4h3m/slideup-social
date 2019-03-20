    jQuery(document).ready(function () {
        var options = [];
        var usernames = [];
        var urls = [];

        var fb = slideup_get_options.fb_username;
        var tw = slideup_get_options.tw_username;
        var ins = slideup_get_options.ins_username;

        var fb_url = slideup_get_options.fb_url;
        var tw_url = slideup_get_options.tw_url;
        var ins_url = slideup_get_options.ins_url;


        if( fb !== "" ){options.push("facebook");usernames.push(fb)}
        if( tw !== "" ){options.push("twitter");usernames.push(tw)}
        if( ins !== "" ){options.push("instagram");usernames.push(ins)}

        if( fb_url !== "" ){urls.push(fb_url)}else{urls.push('#')}
        if( tw_url !== "" ){urls.push(tw_url)}else{urls.push('#')}
        if( ins_url !== ""){urls.push(ins_url)}else{urls.push('#')}


        jQuery('.float-banner').floatbanner({
            socialName: options,
            userName: usernames,
            socialUrl: urls
        });

    });