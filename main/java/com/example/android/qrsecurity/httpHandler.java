package com.example.android.qrsecurity;

/**
 * Created by freddy on 3/2/2016.
 */
import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;
import java.util.ArrayList;
import java.util.List;
import org.apache.http.NameValuePair;
import org.apache.http.client.entity.UrlEncodedFormEntity;
public class httpHandler {
    public String post (String posturl, String contenido, String macaddress){

        try{
            HttpClient httpclient= new DefaultHttpClient();
            HttpPost httppost= new HttpPost(posturl);

            //Añadir parametros
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("scan",contenido));
            params.add(new BasicNameValuePair("mac",macaddress));
            httppost.setEntity(new UrlEncodedFormEntity(params));
            HttpResponse resp= httpclient.execute(httppost);

            HttpEntity ent= resp.getEntity();
            String text = EntityUtils.toString(ent);

            return text;

        }

        catch(Exception e){ return "error";}

    }
}
