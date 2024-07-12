package org.recruit;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.mockito.Mock;
import org.mockito.junit.MockitoJUnitRunner;
import org.recruit.utils.MyGreeter;

import java.time.LocalTime;

import static org.junit.Assert.*;
import static org.mockito.Mockito.*;

@RunWith(MockitoJUnitRunner.class)
public class MyGreeterTests {

    @Mock
    private MyGreeter greeter;

    @Test
    public void testInit(){
        assertTrue(greeter instanceof MyGreeter);
    }

    @Test
    public void testGreeting(){
        // set mock object
        when(greeter.greeting()).thenCallRealMethod();

        // Tests return different greetings depending on the time of hour
        LocalTime currentTime = LocalTime.now();
        int hour = currentTime.getHour();

        // return different value depending on hour
        if (hour >= 6 && hour < 12) {
            when(greeter.greeting()).thenReturn("Good morning");
        } else if (hour >= 12 && hour < 18) {
            when(greeter.greeting()).thenReturn("Good afternoon");
        } else {
            when(greeter.greeting()).thenReturn("Good evening");
        }

        // assert
        String greeting = greeter.greeting();
        assertNotNull(greeting);
        assertTrue(greeting.length() > 0);

        // verify times
        verify(greeter, times(1)).greeting();

        // check return value
        if (hour >= 6 && hour < 12) {
            assertEquals("Good morning", greeting);
        } else if (hour >= 12 && hour < 18) {
            assertEquals("Good afternoon", greeting);
        } else {
            assertEquals("Good evening", greeting);
        }
    }

}
